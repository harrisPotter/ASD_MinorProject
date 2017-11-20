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

    $sql = "SELECT * FROM movie_info where movie_id = '$id'";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    $moviename = $data['movie_name'];
    $movie_image = base64_encode($data['movie_image']);
    $actor = $data['actor'];
    $director = $data['director'];
    $genre = explode(",", $data['genre']);
    $synopsis = $data['synopsis'];
        

    if (isset($_POST['edit_btn'])) {
        
         // keep track post values
        $id = $_POST['id'];
        $genre = $_POST['genre'];
        $moviename = $_POST['movie_name'];
        $imagename = $_POST['imagename'];
        $director = $_POST['director_name'];
        $actor = $_POST['actor_name'];
        $synopsis = $_POST['synopsis'];
        

        if(isset($_POST['genre'])) {
            
            $str_genre = implode(",", $genre);
        }else {
            
            $errors["image"] = ucfirst($imagename) . "Please Select Genre";
        }
        
        if(!has_presence($imagename)) {
            
            $errors[$imagename] = ucfirst($imagename) . "Please Select Image";
        }else {
            
            $image_file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        }
        
        // validate input
        $fields_required = array("movie_name", "director_name", "actor_name", "synopsis");
            //echo print_r($fields_required);
            foreach($fields_required as $field) {
                
                    $value = trim($_POST[$field]);
                
                if(!has_presence($value)) {
                    
                    $errors[$field] = ucfirst($field) . " can't be blank";
                }
                
            }
        
        // update data
        if (empty($errors)) {
            
            echo  $moviename . "<br />" . $actor . "<br />" . $director . "<br />" . $str_genre . "<br />" . $synopsis;
            $sql2 = "UPDATE movie_info set movie_name = '$moviename', movie_image = '$image_file', actor = '$actor', director = '$director', genre = '$str_genre', synopsis ='$synopsis' WHERE movie_id = '$id'";
            $result2 = mysqli_query($connection, $sql2);
            mysqli_close($connection);
            header("Location: movie.php");
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
        <div class="uk-margin-large"></div>
        <div class="uk-padding"></div>
        <div class="uk-flex uk-flex-center">
            <?php
                    echo form_errors($errors);
                ?>
        </div>
        <div class="uk-flex uk-flex-center">

            <h3 class="uk-heading-line uk-text-center"><span>Edit Movie</span></h3>
        </div>

        <form class="uk-form-horizontal" action="edit_movie.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $id;?>" />
            <label class="uk-form-label" style="width:110px">Movie Name</label>
            <div class="uk-form-controls" style="margin-left:130px;">
                <input class="uk-input" name="movie_name" style="width:420px;" type="text" placeholder="movie name" value="<?php echo !empty($moviename)?$moviename:'';?>">

            </div>

            <div class="uk-margin" uk-margin>
                <label class="uk-form-label" style="width:110px">Movie Image</label>
                <div class="uk-form-controls" style="margin-left:130px;">
                    <div uk-form-custom="target: true">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                        <input type="file" name="image" id="image">
                        <input class="uk-input uk-form-width-medium" name="imagename" type="text" placeholder="Select Image">
                    </div>
                </div>
            </div>

            <label class="uk-form-label" style="width:110px">Director Name</label>
            <div class="uk-form-controls" style="margin-left:130px;">
                <input class="uk-input" name="director_name" style="width:420px;" type="text" placeholder="director name" value="<?php echo !empty($director)?$director:'';?>">

            </div>
            <div class="uk-margin" uk-margin>
                <label class="uk-form-label" style="width:110px">Actors</label>
                <div class="uk-form-controls" style="margin-left:130px;">
                    <input class="uk-input" name="actor_name" style="width:420px;" type="text" placeholder="actor names" value="<?php echo !empty($actor)?$actor:'';?>">

                </div>
            </div>

            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label class="uk-form-label" style="width:110;">Genre</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Action">Action</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Romance">Romance</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Horror">Horror</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Drama">Drama</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Scifi">Sci-fi</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Comedy">Comedy</label>
                <label><input class="uk-checkbox" type="checkbox" name = "genre[]" value="Adventure">Adventure</label>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" style="width:110px">Synopsis</label>
                <textarea class="uk-textarea" name="synopsis" rows="5" placeholder="Textarea" style="height:150px;" ><?php echo !empty($synopsis)?$synopsis:'';?></textarea>
            </div>
            <div class="uk-flex uk-flex-center">
                <div class="form-actions">
                    <input name="edit_btn" type="submit" class="uk-button uk-button-primary" value="Update">
                    <a class="uk-button uk-button-danger" href="movie.php">Back</a>
                </div>
            </div>

        </form>

        </div>
  </body>
</html>