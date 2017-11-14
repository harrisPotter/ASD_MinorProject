<?php
    
    session_start();
    include 'function.php';
    require 'database.php';
    confirm_logged_in();
    $errors = array();
    
    
    if (isset($_POST['add_btn'])) {
        
        //echo print_r($_POST);
        // keep track post values
        $moviename = $_POST['movie_name'];
        $imagename = $_POST['imagename'];
        $director = $_POST['director_name'];
        $actor = $_POST['actor_name'];
        $synopsis = $_POST['synopsis'];
        

        if(isset($_POST['genre'])) {
            
            $genre = $_POST['genre'];
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
        
        if (empty($errors)) {
            
            $sql = "INSERT INTO movie_info (movie_name, movie_image, actor, director, genre, synopsis) values('{$moviename}', '{$image_file}', '{$actor}', '{$director}', '{$str_genre}', '{$synopsis}')";
            $result = mysqli_query($connection, $sql);
            mysqli_close($connection);
            header("Location: movie.php");
        }
    }
?>

    <html>

    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/uikit.min.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js"></script>
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

            <h3 class="uk-heading-line uk-text-center"><span>Add Movie</span></h3>
        </div>

        <form class="uk-form-horizontal" action="create_movie.php" method="post" enctype="multipart/form-data">


            <label class="uk-form-label" style="width:110px">Movie Name</label>
            <div class="uk-form-controls" style="margin-left:130px;">
                <input class="uk-input" name="movie_name" style="width:420px;" type="text" placeholder="movie name" value="<?php ?>">

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
                <input class="uk-input" name="director_name" style="width:420px;" type="text" placeholder="director name" value="<?php echo !empty($username)?$username:'';?>">

            </div>
            <div class="uk-margin" uk-margin>
                <label class="uk-form-label" style="width:110px">Actors</label>
                <div class="uk-form-controls" style="margin-left:130px;">
                    <input class="uk-input" name="actor_name" style="width:420px;" type="text" placeholder="actor names" value="<?php echo !empty($username)?$username:'';?>">

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
                <textarea class="uk-textarea" name="synopsis" rows="5" placeholder="Textarea" style="height:150px;"></textarea>
            </div>
            <div class="uk-flex uk-flex-center">
                <div class="form-actions">
                    <input name="add_btn" type="submit" class="uk-button uk-button-primary" value="Add">
                    <a class="uk-button uk-button-danger" href="movie.php">Back</a>
                </div>
            </div>

        </form>

        </div>
    </body>

    </html>

    <script>
        $(document).ready(
            function() {

                $('#submit').click(
                    function() {

                        var image_name = $('#image').val();
                        if (image_name == '') {

                            alert('Please Select Image');
                            return false;
                        }
                    })
            });

    </script>
