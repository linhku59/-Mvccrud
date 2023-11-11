<?php session_unset(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MVC CRUD</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="~/../libs/bootstrap.css">
    <script src="~/../libs/jquery.min.js"></script>
    <script src="~/../libs/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 850px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Employees List</h2>
                        <a href="view/insert.php" class="btn btn-success pull-right">+ Add New Employees</a>
                    </div>
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>STT</th>";
                        echo "<th>Name</th>";
                        echo "<th>Description</th>";
                        echo "<th>Salary</th>";
                        echo "<th>Gender</th>";
                        echo "<th>Birthday</th>";
                        echo "<th>Created_at</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $stt = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $stt++ . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . number_format($row['salary']) . ' VNĐ' . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . date('d-m-Y', strtotime($row['birthday'])) . "</td>";
                            echo "<td>" . date('d-m-Y H:i:s', strtotime($row['created_at'])) . "</td>";
                            echo "<td>";
                            echo "<a href='index.php?act=read&id=" . $row['id'] . "' title='Read Record' data-toggle='tooltip'><i class='fa fa-eye'></i></a>";
                            echo "<a href='index.php?act=update&id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>";
                            echo "<a href='index.php?act=delete&id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        mysqli_free_result($result);
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>