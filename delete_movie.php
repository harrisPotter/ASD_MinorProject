<?php

    session_start();
    require 'database.php';
    require 'function.php';
    confirm_logged_in_admin();

    $id = null;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $sql = "DELETE FROM movie_info  WHERE movie_id = '$id'";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        header("Location: movie.php");
         
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link href="css/uikit.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/uikit.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="uk-position-center uk-card uk-card-default uk-card-large uk-card-body">

            <h3 class="uk-heading-divider">Delete Movie</h3>

            <form class="uk-form-horizontal uk-margin" action="delete_movie.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <label class="alert alert-error">Are you sure to delete ?</label>
                <div class="uk-flex uk-flex-center">
                <div class="form-actions">
                    <input type="submit" class="btn btn-danger" value="Yes">
                    <a class="btn btn-primary" href="movie.php">No</a>
                </div>
                    </div>
            </form>

        </div>
    </body>

    </html>
