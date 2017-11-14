<?php
    session_start();
    require_once('database.php');
    include('function.php');
    confirm_logged_in();
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
                <h3>Movie Management</h3>
            </div>
            <div class="row">
                <a class="uk-button uk-button-primary" href="home.php">Home</a>
                <a class="uk-button uk-button-primary" href="create_movie.php">Add Movie</a>
                <a class="uk-button uk-button-primary" href="index.php">User Management</a>
                <a class="uk-button uk-button-primary" href="cinema.php">Cinema Management</a>
                <a class="uk-button uk-button-danger" href="logout.php">Logout</a>
            </div>
            <div class="row">
                <table class="uk-table uk-table-hover uk-table-divider">
                    <thead>
                        <tr>
                            <th>Movie ID</th>
                            <th>Movie Name</th>
                            <th>Director</th>
                            <th>Actor</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                   
                   $sql = 'SELECT * FROM movie_info ORDER BY movie_id DESC';
                   $query_result = mysqli_query($connection, $sql);
                    
                   while ($row = mysqli_fetch_assoc($query_result)) {
                       echo '<tr>';
                       echo '<td>'. $row['movie_id'] . '</td>';
                       echo '<td>'. $row['movie_name'] . '</td>';
                       echo '<td>'. $row['director'] . '</td>';
                       echo '<td>'. $row['actor'] . '</td>';
                       echo '<td>'. $row['genre'] . '</td>';
                       echo '<td width=350>';
                       echo '<a class="btn" href="read.php?id='.$row['movie_id'].'">Read</a>';
                       echo ' ';
                       echo '<a class="btn btn-success" href="update.php?id='.$row['movie_id'].'">Update</a>';
                       echo ' ';
                       echo '<a class="btn btn-danger" href="delete.php?id='.$row['movie_id'].'">Delete</a>';
                       echo '</td>';
                       echo '</tr>';
                   }
                   mysqli_close($connection);
                  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
