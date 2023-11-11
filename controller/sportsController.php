<?php
require 'model/sportsModel.php';
require 'model/sports.php';
require_once 'config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class sportsController
{

    function __construct()
    {
        $this->objconfig = new config();
        $this->objsm = new sportsModel($this->objconfig);
    }

    public function mvcHandler()
    {
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act) {
            case 'add':
                $this->insert();
                break;
            case 'read':
                $this->read();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                $this->list();
        }
    }

    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }

    public function checkValidation($sporttb)
    {
        $noerror = true;

        if (empty($sporttb->name)) {
            $sporttb->name_msg = "Name không được để trống.";
            $noerror = false;
        } else {
            $sporttb->name_msg = "";
        }

        return $noerror;
    }

    public function insert()
    {
        try {
            $sporttb = new sports();
            if (isset($_POST['addbtn'])) {

                $sporttb->name = trim($_POST['name']);
                $sporttb->description = trim($_POST['description']);
                $sporttb->salary = trim($_POST['salary']);
                $sporttb->gender = trim($_POST['gender']);
                $sporttb->birthday = trim($_POST['birthday']);

                $chk = $this->checkValidation($sporttb);
                if ($chk) {

                    $pid = $this->objsm->insertRecord($sporttb);
                    if ($pid > 0) {
                        $this->list();
                    } else {
                        echo "Somthing is wrong..., try again.";
                    }
                } else {
                    $_SESSION['sporttbl0'] = serialize($sporttb);
                    $this->pageRedirect("view/insert.php");
                }
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }

    public function read()
    {
        try {
            if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $id = $_GET['id'];
                $result = $this->objsm->selectRecord($id);
                $row = mysqli_fetch_array($result);
                $sporttb = new sports();
                $sporttb->id = $row["id"];
                $sporttb->name = $row["name"];
                $sporttb->description = $row["description"];
                $sporttb->salary = $row["salary"];
                $sporttb->gender = $row["gender"];
                $sporttb->birthday = $row["birthday"];
                $_SESSION['sporttbl0'] = serialize($sporttb);
                $this->pageRedirect('view/read.php');
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }

    public function update()
    {
        try {

            if (isset($_POST['updatebtn'])) {
                $sporttb = unserialize($_SESSION['sporttbl0']);
                $sporttb->id = trim($_POST['id']);
                $sporttb->name = trim($_POST['name']);
                $sporttb->description = trim($_POST['description']);
                $sporttb->salary = trim($_POST['salary']);
                $sporttb->gender = trim($_POST['gender']);
                $sporttb->birthday = trim($_POST['birthday']);

                $chk = $this->checkValidation($sporttb);
                if ($chk) {
                    $res = $this->objsm->updateRecord($sporttb);
                    if ($res) {
                        $this->list();
                    } else {
                        echo "Somthing is wrong..., try again.";
                    }
                } else {
                    $_SESSION['sporttbl0'] = serialize($sporttb);
                    $this->pageRedirect("view/update.php");
                }
            } elseif (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $id = $_GET['id'];
                $result = $this->objsm->selectRecord($id);
                $row = mysqli_fetch_array($result);
                $sporttb = new sports();
                $sporttb->id = $row["id"];
                $sporttb->name = $row["name"];
                $sporttb->description = $row["description"];
                $sporttb->salary = $row["salary"];
                $sporttb->gender = $row["gender"];
                $sporttb->birthday = $row["birthday"];
                $_SESSION['sporttbl0'] = serialize($sporttb);
                $this->pageRedirect('view/update.php');
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }

    public function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $this->objsm->deleteRecord($id);
                if ($res) {
                    $this->pageRedirect('index.php');

                } else {
                    echo "Somthing is wrong..., try again.";
                }
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }

    public function list()
    {
        $result = $this->objsm->selectRecord(0);
        include "view/list.php";
    }

}

?>