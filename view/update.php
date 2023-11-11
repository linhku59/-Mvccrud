<?php
require '../model/sports.php';
session_start();
$sporttb = isset($_SESSION['sporttbl0']) ? unserialize($_SESSION['sporttbl0']) : new sports();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>

                    <form action="../index.php?act=update" method="post">
                        <div class="form-group <?php echo (!empty($sporttb->name_msg)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $sporttb->name; ?>">
                            <span class="help-block">
                                <?php echo $sporttb->name_msg; ?>
                            </span>
                        </div>

                        <div class="form-group <?php echo (!empty($sporttb->description_msg)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <input name="description" class="form-control" value="<?php echo $sporttb->description; ?>">
                            <span class="help-block">
                                <?php echo $sporttb->description_msg; ?>
                            </span>
                        </div>

                        <div class="form-group <?php echo (!empty($sporttb->salary_msg)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input name="salary" class="form-control" value="<?php echo $sporttb->salary; ?>">
                            <span class="help-block">
                                <?php echo $sporttb->salary_msg; ?>
                            </span>
                        </div>

                        <div class="form-group <?php echo (!empty($sporttb->gender_msg)) ? 'has-error' : ''; ?>">
                            <label>Gender</label><br>
                            <input type="radio" name="gender" value="Male"> Male &nbsp
                            <input type="radio" name="gender" value="Female"> Female
                            <span class="help-block">
                                <?php echo $sporttb->gender_msg; ?>
                            </span>
                        </div>

                        <div class="form-group <?php echo (!empty($sporttb->birthday_msg)) ? 'has-error' : ''; ?>">
                            <label>Birthday</label>
                            <input type="date" name="birthday" class="form-control"
                                value="<?php echo $sporttb->birthday; ?>">
                            <span class="help-block">
                                <?php echo $sporttb->birthday_msg; ?>
                            </span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $sporttb->id; ?>" />
                        <input type="submit" name="updatebtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>