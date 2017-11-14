<?php
    
    include 'function.php';
    require 'database.php';
    
    $errors = array();

    if (isset($_POST['register_btn'])) {
        
         // keep track post values
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
         
        // insert data
        if (empty($errors)) {
            
            $sql = "INSERT INTO user_info (username, password, email, fName, lName, phoneNumber, privilege) values('{$username}', '{$password}', '{$email}', '{$fName}', '{$lName}', '{$mobile}', 'norm')";
            $result = mysqli_query($connection, $sql);
            mysqli_close($connection);
            header("Location: home.php");
        }
    }
?>

    <html>

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
                
                <h3 class="uk-heading-divider" style="padding: 0 30px 10px 30px">Register</h3>
            </div>

            <form class="uk-form-horizontal" action="create_from_home.php" method="post">
                <div class="uk-column-1-2">
                    <div class="form-group <?php echo !empty($usernameError)?'error':'';?>">
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
                        <input name="register_btn" type="submit" class="uk-button uk-button-primary" value="Create">
                        <a class="uk-button uk-button-danger" href="home.php">Back</a>
                    </div>
                </div>

            </form>

        </div>

        <!-- /container -->
    </body>

    </html>
