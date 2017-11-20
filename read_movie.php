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
        header("Location: movie.php");
    } else {
        
        $sql = "SELECT * FROM movie_info where movie_id = '$id'";
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
    </head>

    <body>
        <div class="container">
            <div class="uk-position-center">
                <div class="card" style="width: 20rem;">
                    <div class="uk-flex uk-flex-center">
                        <div class="uk-width-1-3">
                            <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($data['movie_image']) ?>" alt="Card image cap">
                        </div>
                    </div>
                    <div class="card-body" style="height:35px">
                        <div class="uk-flex uk-flex-center">
                        <h4 class="card-title"><?php echo $data['movie_name'];?></h4>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush" style="margin-top:10px">
                        <li class="list-group-item">Director: <?php echo $data['director'];?></li>
                        <li class="list-group-item">Actor: <?php echo $data['actor'];?></li>
                        <li class="list-group-item">
                            Genre: <?php    $value = explode(",", $data['genre']); 
                                            for($x = 0; $x < count($value); $x++) { 
                                                echo '<span class="uk-badge">' .$value[$x]. '</span>';
                                            }
                                    ?>
                        </li>
                        <li class="list-group-item">Synopsis: <?php echo $data['synopsis'];?></li>
                        <li class="list-group-item">Price: <?php echo $data['price'];?>.00 Pesos</li>
                    </ul>
                    <div class="card-body">
                        <div class="uk-flex uk-flex-center">
                        <a class="uk-button uk-button-primary" href="movie.php">Back</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /container -->
    </body>

    </html>