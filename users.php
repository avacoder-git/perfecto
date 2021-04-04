<?php

include('security2.php');
include ('database.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<form action="logout2.php" method="post">
    <button class="btn btn-primary" type="submit" name="logout">Logout</button>
</form>

<?php
if (isset($_SESSION['message'])):
    ?>

    <div class="alert  mt-3  alert-<?=$_SESSION['msg_type']?>">
        <h3 class="text-center">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </h3>
    </div>

<?php
endif
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">username</th>
        <th scope="col">Password</th>
        <th scope="col">Control</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <th scope="row">1</th>
        <td>ava_coder</td>
        <td>a1v2a3z4</td>
    </tr>

    <?php
    require_once 'database.php';
    require_once 'users_code.php';

    ?>
    <?php

    $result = $mysqli->query("select * from users") or die($mysqli->error);

    ?>

    <?php
    while ($row = $result->fetch_assoc()):

        if($row['username']=="ava_coder"&& $row['password']=="a1v2a3z4")
        {
            continue;
        }
    ?>
        <form action="users_code.php" method="post">
            <tr>
                <th scope="row"><?php echo $row['user_id']?></th>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['password']?></td>
                <td>
                    <a href="users_code.php?delete=<?php echo $row['user_id']?>" class="btn btn-danger">Delete</a>
                    <a href="users.php?edit=<?php echo $row['user_id']?>" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        </form>
    <?php
    endwhile;
    ?>
    </tbody>
</table>


<form action="users_code.php" method="post">
    <input type="hidden" name="user_id  " value="<?php  echo $id ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <input type="text " name="username" class="form-control mb-3 rounded-pill" placeholder="username" value="<?php echo $username2  ?>" required>
                        <input type="password" name="password" class="form-control rounded-pill" placeholder="password" value="<?php echo $password2  ?>" required>
                    </div>
                    <div class="card-footer">

                        <?php
                        if($update == true){
                        ?>
                            <button type="submit" class="btn btn-primary mx-auto" name="update">Update</button>
                            <a href="users.php" class="btn btn-danger">Clear</a>
                        <?php  }
                        else{
                        ?>
                        <input type="submit" name="add_user" class="form-control rounded-pill btn btn-success" value="Save">
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>




</form>

</body>
</html>
