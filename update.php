<?php
    
    session_start();
    include 'function.php';
    require 'database.php';
    confirm_logged_in_admin();

    $errors = array();
    
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    $sql = "SELECT * FROM user_info where user_ID = '$id'";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $fName = $data['fName'];
    $lName = $data['lName'];
    $mobile = $data['phoneNumber'];
        

    if (isset($_POST['update_btn'])) {
        
         // keep track post values
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $mobile = $_POST['mobile'];
         
        // validate input
        $fields_required = array("username", "password", "email", "fName", "lName", "mobile");
        foreach($fields_required as $field) {
            
            $value = trim($_POST[$field]);
            if(!has_presence($value)) {
                
                $errors[$field] = ucfirst($field) . " can't be blank";
            }
        }
        // update data
        if (empty($errors)) {
            
            $sql2 = "UPDATE user_info set username = '$username', password = '$password', email = '$email', fName = '$fName', lName = '$lName', phoneNumber ='$mobile' WHERE user_ID = '$id'";
            $result2 = mysqli_query($connection, $sql2);
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
    <script src="js/uikit.min.js"></script>
</head>
 
<body>
    <div class="uk-position-center uk-card uk-card-default uk-card-large uk-card-body">
            <div class="uk-flex uk-flex-center">
                <?php
                    echo form_errors($errors);
                ?>
            </div>
            <div class="uk-flex uk-flex-center">
                
                <h3>Update</h3>
            </div>

            <form class="uk-form-horizontal" action="update.php" method="post">
                <div class="uk-column-1-2">
                    <div class="form-group <?php echo !empty($usernameError)?'error':'';?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>" />
                        <label class="uk-form-label" style="margin-top : 0px">Username</label>
                        <div class="controls">
                            <input class="form-control" name="username" type="text" placeholder="username" value="<?php echo !empty($username)?$username:'';?>">

                        </div>
                    </div>
                    <div class="form-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input class="form-control" name="email" type="text" placeholder="email address" value="<?php echo !empty($email)?$email:'';?>">
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input class="form-control" name="password" type="password" placeholder="password" value="<?php echo !empty($password)?$password:'';?>">
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty($fNameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input class="form-control" name="fName" type="text" placeholder="first name" value="<?php echo !empty($fName)?$fName:'';?>">
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty($lNameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input class="form-control" name="lName" type="text" placeholder="last name" value="<?php echo !empty($lName)?$lName:'';?>">
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input class="form-control" name="mobile" type="text" placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                        </div>
                    </div>
                </div>
                <div class="uk-flex uk-flex-center">
                    <div class="form-actions">
                        <input name="update_btn" type="submit" class="btn btn-success" value="Update">
                        <a class="btn" href="index.php">Back</a>
                    </div>
                </div>

            </form>

        </div>
  </body>
</html>