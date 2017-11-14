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
                <h3>User Management</h3>
            </div>
            <div class="row">
                <a class="uk-button uk-button-primary" href="home.php">Home</a>
                <a class="uk-button uk-button-primary" href="create_from_admin.php">Create</a>
                <a class="uk-button uk-button-primary" href="movie.php">Movie Management</a>
                <a class="uk-button uk-button-primary" href="cinema.php">Cinema Management</a>
                <a class="uk-button uk-button-danger" href="logout.php">Logout</a>
            </div>
            <div class="row">
                <table class="uk-table uk-table-hover uk-table-divider">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile Number</th>
                            <th>Privilege</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                   
                   $sql = 'SELECT * FROM user_info ORDER BY user_ID DESC';
                   $query_result = mysqli_query($connection, $sql);
                    
                   while ($row = mysqli_fetch_assoc($query_result)) {
                       echo '<tr>';
                       echo '<td>'. $row['user_ID'] . '</td>';
                       echo '<td>'. $row['username'] . '</td>';
                       echo '<td>'. $row['email'] . '</td>';
                       echo '<td>'. $row['fName'] . '</td>';
                       echo '<td>'. $row['lName'] . '</td>';
                       echo '<td>'. $row['phoneNumber'] . '</td>';
                       echo '<td>'. $row['privilege'] . '</td>';
                       echo '<td width=350>';
                       echo '<a class="btn" href="read.php?id='.$row['user_ID'].'">Read</a>';
                       echo ' ';
                       echo '<a class="btn btn-success" href="update.php?id='.$row['user_ID'].'">Update</a>';
                       echo ' ';
                       echo '<a class="btn btn-danger" href="delete.php?id='.$row['user_ID'].'">Delete</a>';
                       echo '<a class="btn btn-default" href="privilege.php?id='.$row['user_ID'].'" style = "margin-left : 5px;">Privilege</a>';
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
