<?php
require '../model/sports.php';
session_start();
$sporttb = isset($_SESSION['sporttbl0']) ? unserialize($_SESSION['sporttbl0']) : new sports();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Read Record</title>
    <link rel="stylesheet" href="../libs/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Read Record</h2>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $sporttb->name; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input name="description" class="form-control" value="<?php echo $sporttb->description; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Salary</label>
                        <input name="salary" class="form-control" value="<?php echo $sporttb->salary; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="text" name="gender" class="form-control" value="<?php echo $sporttb->gender; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" name="birthday" class="form-control" value="<?php echo $sporttb->birthday; ?>" readonly>
                    </div>

                    <a href="../index.php" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>