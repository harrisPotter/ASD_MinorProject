<?php
    session_start();
    require_once("function.php");
    require_once("database.php");
    $errors = array();
    already_logged_in();

    if (isset($_POST['login_btn'])) {
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        
        $sql = "SELECT * FROM user_info WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($result);
        
        //Validations
        $fields_required = array("username", "password");
        foreach($fields_required as $field) {
            
            $value = trim($_POST[$field]);
            if(!has_presence($value)) {
                
                $errors[$field] = ucfirst($field) . " can't be blank";
            }
        }
        
        if(empty($errors)) {
            
            if($username == $data['username'] && $password == $data['password'] && $data['privilege'] == 'admin') {
                
                $_SESSION["user_id"] = $data['user_ID'];
                $_SESSION["name"] = $data['username'];
                $_SESSION['privilege'] = $data['privilege'];
                header("location: home.php");
            }else if($username == $data['username'] && $password == $data['password'] && $data['privilege'] == 'norm') {
             
                $_SESSION["user_id"] = $data['user_ID'];
                $_SESSION["name"] = $data['username'];
                $_SESSION['privilege'] = $data['privilege'];
                header("location: home.php");
            }else {
            
                $errors["match_form"] = "Username/Password do not match";
            }
        }
        mysqli_close($connection);
    }
?>
<html>

<head>
    <link rel="stylesheet" href="css/uikit.min.css">
</head>
    <script src="js/uikit.min.js"></script>
<body>
    
    <div class="uk-position-center">
        <?php 
                                                    
            echo form_errors($errors);
        ?>
        <h2 class="uk-heading-divider">Login</h2>
        
        <form class="uk-form-horizontal uk-margin" method="post">

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text" style="width:100px">Username</label>
                <div class="uk-form-controls" style="margin-left:100px">
                    <input class="uk-input" name="username" id="form-horizontal-text" type="text">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-select" style="width:100px">Password</label>
                <div class="uk-form-controls" style="margin-left:100px" ss>
                    <input class="uk-input" name="password" id="form-horizontal-text" type="password">
                </div>
            </div>
            <div class="uk-flex uk-flex-center">

                <input class="uk-button uk-button-primary" type="submit" name="login_btn" value="Login">
                &nbsp;
                <a class="uk-button uk-button-danger" href="home.php">Back</a>
            </div>
        </form>
    </div>
</body>

</html>