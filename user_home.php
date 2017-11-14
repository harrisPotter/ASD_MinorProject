<?php
    session_start();
?>

    <html>

    <head>
        <link rel="stylesheet" href="css/uikit.min.css">
    </head>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>

    <body>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
            <nav class="uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
                <div class="uk-navbar-left">
                    <div class="uk-padding"></div>
                    <ul class="uk-navbar-nav uk-subnav-divider">
                        <li><a href="#modal_about" uk-toggle><span uk-icon = "icon: user"></span>About Us</a></li>
                        <div id="modal_about" class="uk-flex-top" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-header">
                                    <h2 class="uk-modal-title">About Us</h2>
                                </div>
                                <div class="uk-modal-body">
                                    <div class="uk-flex uk-flex-center">
                                        <div class="uk-margin">
                                        <h2>Who are we?</h2>

                                        <p>CineReserve is a reservation site wherein people can reserve seats for their desrires movies that </p>
                                        <p> We strive to improve every day to ensure our customers have the best time and leave with fond memories only to return for more exciting cinematic experience. We have a dedicated team behind these screens who are committed to make you smile! We refurbished some of our flagship locations to give it a fresh look, mainly to adopt a more welcoming, vibrant, contemporary ambiance. Some of the cinema halls were redesigned and renovated to maximise the space.
                                        <p>

                                        <h2>Where are we located?</h2>

                                        <p>Our cinema is located at the 3rd floor at the Coders mall at the Java Strret Programming City</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                </div>
                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav uk-subnav-divider">
                        <li>
                            <div class="uk-navbar-item">
                                <div>WELCOME!
                                    <a href="#">
                                        <?php echo $_POST['username']; ?>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li><a href="signout.php"><span uk-icon = "icon: sign-out"></span>Logout</a></li>

                    </ul>
                    <div class="uk-padding"></div>
                </div>

            </nav>
        </div>
    </body>

    </html>