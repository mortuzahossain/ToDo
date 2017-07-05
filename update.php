
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
</head>

<body>

    <!--Header Paert-->
    <div class="container header">
        <div class="row">
            <div class="col-md-12">
                <a href="index.php"><h1 class="header_text text-center">My To Do List</h1></a>
            </div>
        </div>
    </div>

    <?php
    require_once 'include/db_connect.php';
    $id = $_GET['id'];
    $showing_query = "SELECT * FROM todo_list where id=$id";
    $query = mysqli_query($conn,$showing_query)->fetch_assoc();

    if (isset($_POST['delete'])) {
        $delete_query = "DELETE FROM todo_list WHERE id=$id";
        if (mysqli_query($conn,$delete_query)) {
            header('Location: index.php');
        } else {
            echo "<p class='text-center bg-danger'>Something Wrong. Please try again<p>";
        }
    }
    if (isset($_POST['update'])) {
        $update_todo = $_POST['todo'];
        $update_query = "UPDATE todo_list SET todo_text = '$update_todo' WHERE id= $id";
        if (mysqli_query($conn,$update_query)) {
            echo "<p class='text-center bg-primary'>Successfully Updated<p>";
        } else {
            echo "<p class='text-center bg-danger'>Something Wrong. Please try again<p>";
        }
    }
    ?>

    <div class="container text-center input_data">
        <div class="row">
            <form action="" method="post">
                <input class="form-control" type="text" name="todo" placeholder="To do task..." value="<?php echo $query['todo_text'];  ?>">
                <input type="reset" name="Reset" class="btn btn">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
        </div>
    </div>
    <div class="container display_data">
    </div>

    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>