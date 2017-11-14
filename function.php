<?php

    function form_errors($errors = array()) {
    
        $errorMessage = "";
        if(!empty($errors)) {
            
            $errorMessage .= "<div class=\"uk-alert-warning\" uk-alert>";
            $errorMessage .= "<a class=\"uk-alert-close\" uk-close></a>";
            $errorMessage .= "<h4 style=\"margin-bottom: 0px;\">ERROR!</h4><ul style=\"margin-top:0px\">";
            foreach ($errors as $key => $error) {
                
                $errorMessage .= "<li>{$error}</li>";
            }
            $errorMessage .= "</ul>";
            $errorMessage .= "</div>";
        }
        return $errorMessage;
    }

    function has_presence($value) {
        
        return isset($value) && $value !== "";
    }

    function has_max_length($value, $max) {
        
        return strlen($value) <= $max;
    }

    function logged_in() {
        
        return isset($_SESSION['user_id']);
    }
    
    function confirm_logged_in() {
        
        if(!logged_in()) {
            
            header("location:login.php");
        }
    }
?>