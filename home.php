<?php
    session_start();
    require_once('database.php');
    include('function.php');
?>
    <html>

    <head>
        <link rel="stylesheet" href="css/uikit.min.css">
        <!--<link rel="stylesheet" href="css/uikit.css">-->
    </head>
    <script src="js/uikit.min.js"></script>
    <!--<script src="js/uikit.js"></script>-->
    <script src="js/uikit-icons.min.js"></script>

    <body>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
            <nav class="uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
                <div class="uk-navbar-left">
                    <div class="uk-padding"></div>
                    <ul class="uk-navbar-nav uk-subnav-divider">

                        <?php 
                            if(!isset($_SESSION['name'])) {

                                echo '<li><a href="login.php"><span uk-icon = "icon: sign-in"></span>Login</a></li>';
                                echo '<li><a href="create_from_home.php"><span uk-icon = "icon: pull"></span>Register</a></li>';
                            }
                        ?>

                        <li><a href="#cinema"><span uk-icon = "icon: image"></span>Cinema</a></li>
                        <li><a href="#about"><span uk-icon = "icon: user"></span>About Us</a></li>
                    </ul>

                </div>
                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav">
                        <?php 
                            if(isset($_SESSION['name'])) {

                                echo '<div class="uk-navbar-item"><div>WELCOME! '; 
                                echo '<a href="';
                                    if($_SESSION['privilege'] == 'admin') {
                                        
                                        echo 'index.php';
                                    }else {
                                        
                                        echo '#';
                                    }
                                echo '">'; 
                                echo $_SESSION['name'] .'</a></div></div>';
                                echo '<li><a href="logout.php">Logout</a></li>';
                            }
                        ?>
                    </ul>
                    <div class="uk-padding"></div>
                </div>
            </nav>
        </div>
        <center>
            <div class="uk-container-small uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: push">

                <ul class="uk-slideshow-items">
                    <li>
                        <video autoplay loop muted playslinline uk-cover>
                            <source src="vids/JUSTICE%20LEAGUE%20-%20Official%20Heroes%20Trailer.mp4" type="video/mp4">
                        </video>
                    </li>
                    <li>
                        <video autoplay loop muted playslinline uk-cover>
                            <source src="vids/BAD%20GENIUS%20Official%20International%20Trailer%20(2017)%20_%20GDH.mp4" type="video/mp4">
                        </video>
                    </li>
                    <li>
                        <video autoplay loop muted playslinline uk-cover>
                            <source src="vids/Jigsaw%20(2017%20Movie)%20Official%20Trailer.mp4" type="video/mp4">
                        </video>
                    </li>
                    <li>
                        <video autoplay loop muted playslinline uk-cover>
                            <source src="vids/_Thor-%20Ragnarok_%20Official%20Trailer.mp4" type="video/mp4">
                        </video>
                    </li>
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
            <h2 class="uk-heading-line uk-text-center" style="margin-top:10px;margin-bottom:0px"><span>Trailers</span></h2>
        </center>

        <div class="uk-padding" id="cinema"></div>
        <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                    <h3 class="uk-card-title uk-heading-divider">Cinema 1</h3>
                    <table class="uk-table uk-table-justify uk-table-divider">
                        <tbody>
                            <?php
                            
                                $sql_mov = "SELECT * FROM cinema1_details";
                                $res = mysqli_query($connection, $sql_mov);
                                while($row = mysqli_fetch_assoc($res)) {
                                    
                                    echo '<tr>';
                                    echo '<td>'. $row['movie_name'] .'</td>';
                                    echo '<td>'. $row['time_slot'] .'</td>';
                                    echo '<td><a class="uk-button uk-button-default" type="button" href="#">Book</button></td>';
                                    echo '</tr>';       
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                    <h3 class="uk-card-title uk-heading-divider">Cinema 2</h3>
                    <table class="uk-table uk-table-justify uk-table-divider">
                        <tbody>
                            <?php
                            
                                $sql_mov1 = "SELECT * FROM cinema2_details";
                                $res1 = mysqli_query($connection, $sql_mov1);
                                while($row1 = mysqli_fetch_assoc($res1)) {
                                    
                                    echo '<tr>';
                                    echo '<td>'. $row1['movie_name'] .'</td>';
                                    echo '<td>'. $row1['time_slot'] .'</td>';
                                    echo '<td><a class="uk-button uk-button-default" type="button" href="tries.php">Book</button></td>';
                                    echo '</tr>';       
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                <h3 class="uk-card-title uk-heading-divider" style="padding-bottom:0px;margin-bottom:0px;height:44px;">Cinema 3</h3>
                <table class="uk-table uk-table-justify uk-table-divider">
                    <tbody>
                        <?php
                            
                                $sql_mov2 = "SELECT * FROM cinema3_details";
                                $res2 = mysqli_query($connection, $sql_mov2);
                                while($row2 = mysqli_fetch_assoc($res2)) {
                                    
                                    echo '<tr>';
                                    echo '<td>'. $row2['movie_name'] .'</td>';
                                    echo '<td>'. $row2['time_slot'] .'</td>';
                                    echo '<td><a class="uk-button uk-button-default" type="button" href="#">Book</button></td>';
                                    echo '</tr>';       
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="uk-flex uk-flex-center" id="about">
            <div class="uk-margin">
                <h2>Who are we?</h2>

                <p>CineReserve is a reservation site wherein people can reserve seats for their desrires movies that </p>
                <p> We strive to improve every day to ensure our customers have the best time and leave with fond memories only to return for more exciting cinematic experience. We have a dedicated team behind these screens who are committed to make you smile! We refurbished some of our flagship locations to give it a fresh look, mainly to adopt a more welcoming, vibrant, contemporary ambiance. Some of the cinema halls were redesigned and renovated to maximise the space.
                    <p>

                        <h2>Where are we located?</h2>

                        <p>Our cinema is located at the 3rd floor at the Coders mall at the Java Strret Programming City</p>
            </div>
        </div>
        <ul class="uk-breadcrumb" style="margin-bottom:0px">
            <li>Cinema Reservation All Rights Reserved 2010</li>
            <li><a href="#">Terms and Condition</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
    </body>

    </html>
