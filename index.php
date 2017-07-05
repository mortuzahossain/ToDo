

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.png">

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
// Database Connection
    require_once 'include/db_connect.php';
// Inserting Data
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Taking Form input
	        $todo = $_POST['todo'];
	        // Inserting Query
	        if (!empty($todo)) {
	                $insert_query = "INSERT INTO todo_list (todo_text) VALUES ('$todo')";
	        if (mysqli_query($conn,$insert_query)) {
	            echo "<p class='text-center bg-primary'>Successfully Added<p>";
	        } else {
	            echo "<p class='text-center bg-danger'>Something Wrong. Please try again<p>";
	        }
    	}

    }
// Sowing Data
    $showing_query = "SELECT * FROM todo_list ORDER BY id DESC";
    $query = mysqli_query($conn,$showing_query);
    while ($row = mysqli_fetch_assoc($query))
    {
        $todo_array[] = $row;
    }
    $serial_no = 1;
?>

    <!--Inserting Form-->
    <div class="container text-center input_data">
        <div class="row">
            <form action="" method="post" class="form-inline">
                <input class="form-control" type="text" name="todo" placeholder="To do task...">
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </form>
        </div>
    </div>


    <!--Display Data-->
    <div class="container display_data">
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <td>#</td>
                    <td>Task</td>
                    <td>Action</td>
                </tr>

                <?php if(sizeof($todo_array)>0){ foreach ($todo_array as $db_todo_text) { ?>
                    <tr>
                        <td><?php echo $serial_no; ?></td>
                        <td><?php echo $db_todo_text['todo_text']; ?></td>
                        <td><a href="update.php?id=<?php echo $db_todo_text['id']; ?>">Update</a></td>
                    </tr>
                <?php $serial_no++; }}else { ?>
                    <tr>
                        <td>1</td>
                        <td>This is test Task</td>
                        <td><a href="#">Update</a></td>
                    </tr
                    <tr>
                        <td>2</td>
                        <td>This is test Task</td>
                        <td><a href="#">Update</a></td>
                    </tr
                    <tr>
                        <td>3</td>
                        <td>This is test Task</td>
                        <td><a href="#">Update</a></td>
                    </tr
                    <tr>
                        <td>4</td>
                        <td>This is test Task</td>
                        <td><a href="update.php?id=">Update</a></td>
                    </tr
                <?php } ?>

            </table>
        </div>
    </div>

    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>