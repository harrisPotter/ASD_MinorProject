<?php

    session_start();
    include 'function.php';
    require 'database.php';
    confirm_logged_in();

    $errors = array();
    
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    $sql = "SELECT * FROM user_info where user_ID = '$id'";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);

    if (isset($_POST['set_admin_btn'])) {
        
        $id = $_POST['id'];
       // update privilege data into admin
        if (empty($errors)) {
            
            $sql = "UPDATE user_info  SET privilege = 'admin' WHERE user_ID = '$id'"; 
            $result = mysqli_query($connection, $sql);
            mysqli_close($connection);
            header("Location: index.php");
        }
    }
    if (isset($_POST['set_norm_btn'])) {
        
        $id = $_POST['id'];
        // update privilege data into norm
        if (empty($errors)) {
            
            $sql = "UPDATE user_info  SET privilege = 'norm' WHERE user_ID = '$id'"; 
            $result = mysqli_query($connection, $sql);
            mysqli_close($connection);
            header("Location: index.php");
        }
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
    <div class="uk-position-center uk-card uk-card-default uk-card-large uk-card-body">
            
            <h3 class="uk-heading-divider">Set Customer Privilege</h3>
            
            <form class="uk-form-horizontal uk-margin" action="privilege.php" method="post">
                <div class="uk-flex uk-flex-center">
                <input type="hidden" name="id" value="<?php echo $id;?>" />
                <label class="alert alert-error"><?php echo 'User no.'. $id. ': ' .$data['username']. ' '?></label>
                
                <div class="form-actions">
                    <input name="set_admin_btn" type="submit" class="btn btn-success" value="Set Admin">                    
                    <input name="set_norm_btn" type="submit" class="btn btn-default" value="Set Normal">
                    <a class="btn btn-danger" href="index.php">Back</a>
                </div>
                </div>
            </form>

        </div>
  </body>
</html>