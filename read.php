<?php
    session_start();
    require 'database.php';
    require 'function.php';
    confirm_logged_in_admin();

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        
        $sql = "SELECT * FROM user_info where user_ID = '$id'";
        $query_result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($query_result);
        mysqli_close($connection);
    }
?>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/uikit.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/uikit.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="uk-position-center">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $data['fName']. ' ' . $data['lName'] . '\'s info';?></h4>
                        
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Username: <?php echo $data['username'];?></li>
                        <li class="list-group-item">Password: <?php echo md5($data['password']);?></li>
                        <li class="list-group-item">Email Address: <?php echo $data['email'];?></li>
                        <li class="list-group-item">Phone Number: <?php echo $data['phoneNumber'];?></li>
                    </ul>
                    <div class="card-body">
                        <div class="uk-flex uk-flex-center">
                            <a class="uk-button uk-button-primary" href="index.php">Back</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /container -->
    </body>

    </html>
