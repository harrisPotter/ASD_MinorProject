<?php
    session_start();
    require_once('database.php');
    include('function.php');
    confirm_logged_in_admin();
    
    if(isset($_POST['select_btn'])) {
        
        $position = $_POST['pos']+1;
        $movie = $_POST['movie'];
        
        $sql = "SELECT * FROM movie_info WHERE movie_name = '$movie'";
        $sRes = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($sRes);
        
        $sql2 = "UPDATE cinema1_details SET movie_name = '$movie' WHERE slot = '$position'";
        $res2 = mysqli_query($connection, $sql2);
    }

    if(isset($_POST['select_btn1'])) {
        
        $position1 = $_POST['pos1']+1;
        $movie1 = $_POST['movie1'];
        
        $sql1 = "SELECT * FROM movie_info WHERE movie_name = '$movie1'";
        $sRes1 = mysqli_query($connection, $sql1);
        $data1 = mysqli_fetch_assoc($sRes1);
        
        $sql3 = "UPDATE cinema2_details SET movie_name = '$movie1' WHERE slot = '$position1'";
        $res3 = mysqli_query($connection, $sql3);
    }

    if(isset($_POST['select_btn2'])) {
        
        $position2 = $_POST['pos2']+1;
        $movie2 = $_POST['movie2'];
        
        $sql2 = "SELECT * FROM movie_info WHERE movie_name = '$movie2'";
        $sRes2 = mysqli_query($connection, $sql2);
        $data2 = mysqli_fetch_assoc($sRes2);
        
        $sql4 = "UPDATE cinema3_details SET movie_name = '$movie2' WHERE slot = '$position2'";
        $res4 = mysqli_query($connection, $sql4);
    }
?>
    <html>

    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/uikit.min.css" rel="stylesheet">
        <script src="js/uikit.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h3>Cinema Management</h3>
            </div>
            <div class="row">
                <a class="uk-button uk-button-primary" href="home.php">Home</a>
                <a class="uk-button uk-button-primary" href="index.php">User Management</a>
                <a class="uk-button uk-button-primary" href="movie.php">Movie Management</a>
                <a class="uk-button uk-button-danger" href="logout.php">Logout</a>
            </div>
            <div class="uk-margin">
                <div>
                    <div uk-grid>
                        <div class="uk-width-auto@m">
                            <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                                <li><a href="#">Cinema 1</a></li>
                                <li><a href="#">Cinema 2</a></li>
                                <li><a href="#">Cinema 3</a></li>
                            </ul>
                        </div>
                        <div class="uk-width-expand@m">
                            <ul id="component-tab-left" class="uk-switcher">
                                <li>
                                    <table class="uk-table uk-table-justify uk-table-divider">
                                        <thead>
                                            <tr>
                                                <th>Movie Name</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                   
                                                    $sql_mov = "SELECT * FROM cinema1_details";
                                                    $res = mysqli_query($connection, $sql_mov);
                                                    $x = 0; 
                                                    while($mov_data = mysqli_fetch_assoc($res)) {
                                                        $sql_1 = 'SELECT * FROM movie_info';
                                                        $query_result[$x] = mysqli_query($connection, $sql_1);
                                                        echo '<tr>';
                                                        echo '<td>'. $mov_data['movie_name'] .'</td>';
                                                        echo '<td>'. $mov_data['time_slot'] .'</td>';
                                                        echo '<td width=250>';
                                                        echo '<form method = "post">';
                                                        echo '<div class="uk-margin">';
                                                        echo '<select class="uk-select" name="movie">';
                                                        echo '<option></option>';
                                                        while ($movie = mysqli_fetch_assoc($query_result[$x])) {
                                                            
                                                            echo '<option>';
                                                            echo $movie['movie_name'];
                                                            echo '</option>';
                                                        }
                                                        echo '</select>';
                                                        echo '</div>';
                                                        echo '<input type="hidden" name="pos" value="'. $x .'">';
                                                        echo '<input class="uk-button uk-button-default" name="select_btn[]" type="submit" value="Select">';
                                                        echo '</form>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        $x++;
                                                   }
                                                ?>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <table class="uk-table uk-table-justify uk-table-divider">
                                        <thead>
                                            <tr>
                                                <th>Movie Name</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                   
                                                    $sql_mov1 = "SELECT * FROM cinema2_details";
                                                    $res1 = mysqli_query($connection, $sql_mov1);
                                                    $y = 0; 
                                                    while($mov_data1 = mysqli_fetch_assoc($res1)) {
                                                        $sql_2 = 'SELECT * FROM movie_info';
                                                        $query_result1[$y] = mysqli_query($connection, $sql_2);
                                                        echo '<tr>';
                                                        echo '<td>'. $mov_data1['movie_name'] .'</td>';
                                                        echo '<td>'. $mov_data1['time_slot'] .'</td>';
                                                        echo '<td width=250>';
                                                        echo '<form method = "post">';
                                                        echo '<div class="uk-margin">';
                                                        echo '<select class="uk-select" name="movie1">';
                                                        echo '<option></option>';
                                                        while ($movie1 = mysqli_fetch_assoc($query_result1[$y])) {
                                                            
                                                            echo '<option>';
                                                            echo $movie1['movie_name'];
                                                            echo '</option>';
                                                        }
                                                        echo '</select>';
                                                        echo '</div>';
                                                        echo '<input type="hidden" name="pos1" value="'. $y .'">';
                                                        echo '<input class="uk-button uk-button-default" name="select_btn1[]" type="submit" value="Select">';
                                                        echo '</form>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        $y++;
                                                   }
                                                ?>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <table class="uk-table uk-table-justify uk-table-divider">
                                        <thead>
                                            <tr>
                                                <th>Movie Name</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                   
                                                    $sql_mov2 = "SELECT * FROM cinema3_details";
                                                    $res2 = mysqli_query($connection, $sql_mov2);
                                                    $z = 0; 
                                                    while($mov_data2 = mysqli_fetch_assoc($res2)) {
                                                        $sql_3 = 'SELECT * FROM movie_info';
                                                        $query_result2[$z] = mysqli_query($connection, $sql_3);
                                                        echo '<tr>';
                                                        echo '<td>'. $mov_data2['movie_name'] .'</td>';
                                                        echo '<td>'. $mov_data2['time_slot'] .'</td>';
                                                        echo '<td width=250>';
                                                        echo '<form method = "post">';
                                                        echo '<div class="uk-margin">';
                                                        echo '<select class="uk-select" name="movie2">';
                                                        echo '<option></option>';
                                                        while ($movie2 = mysqli_fetch_assoc($query_result2[$z])) {
                                                            
                                                            echo '<option>';
                                                            echo $movie2['movie_name'];
                                                            echo '</option>';
                                                        }
                                                        echo '</select>';
                                                        echo '</div>';
                                                        echo '<input type="hidden" name="pos2" value="'. $z .'">';
                                                        echo '<input class="uk-button uk-button-default" name="select_btn2[]" type="submit" value="Select">';
                                                        echo '</form>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        $z++;
                                                   }
                                                ?>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
