<?php
include "security.php";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mijozlar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ismi Famiyasi</th>
                    <th scope="col">Telefon raqami</th>
                    <th scope="col">Mamlakati</th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once 'database.php';
                require_once 'users_code.php';

                ?>
                <?php

                $result = $mysqli->query("select * from clients") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):

                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['client_id']?></th>
                            <td><?php echo $row['client_name']?></td>
                            <td><?php echo $row['client_phone']?></td>
                            <td><?php echo $row['client_target']?></td>
                            <td><?php echo $row['date']?></td>
                        </tr>
                <?php
                endwhile;
                ?>
                </tbody>
            </table>

            <form action="excel.php" method="post">
                <input type="submit" name="export" value="Excel formatda yuklab olish" class="btn btn-success">
                <input type="submit" name="clear" value="Tozalash" class="btn btn-danger">
            </form>

        </div>
    </div>
</div>

</body>
</html>