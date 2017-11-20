<?php  
    
    include('database.php');
    
    function seat($seat_num) {
    global $connection;
    $sql = "SELECT * from cinema1_bookings";
    $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            
            if($seat_num == $row['seat_number']) {
                
                if($row['status'] == 'booked') {
                    
                    return '<input class="uk-checkbox" type="checkbox" disabled>';
                }
                else if($row['status'] == 'unbooked') {
                
                    return '<input class="uk-checkbox" name="seat_no[]" type="checkbox" value="'.$row['seat_number'].'">';
                }
            }
        }
    }

    if(isset($_POST['book_btn'])) {
        
        $seat_q = $_POST['seat_no'];
        for($x = 0; $x < count($seat_q); $x++) {
            
            $sql_book = "UPDATE cinema1_bookings SET status = 'booked' WHERE seat_number = $seat_q[$x]";
            $book_res = mysqli_query($connection, $sql_book);
        }
        
    }
?>
<html>
<head>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/uikit.min.js"></script>
</head>

<body>
    <div class="uk-position-center">
        <div class="uk-column-1-3">
            <form method="post" action="tries.php">
                <?php $seat = 1; ?>
                <fieldset class="uk-fieldset" style="height:690px">
                    <table class="uk-table uk-table-divider" style="margin-top:0px">
                        <tbody>
                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid" style="margin-bottom:0px">
                                <?php
                                    for($x = 0; $x < 6; $x++) {

                                        echo '<tr>';
                                        for($y = 0; $y < 6; $y++) {

                                            echo '<th><label>'. seat($seat) .' '. $seat++ .'</label></th>';
                                        }
                                        echo '</tr>';
                                    }
                                ?>
                            </div>
                        </tbody>
                    </table>
                    <table class="uk-table uk-table-divider">
                        <tbody>
                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                <?php
                                    for($x = 0; $x < 6; $x++) {

                                    echo '<tr>';
                                    for($y = 0; $y < 6; $y++) {

                                        echo '<th><label>'. seat($seat) .' '. $seat++ .'</label></th>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                            </div>
                        </tbody>
                    </table>
                    <input type="submit" class="uk-button uk-button-default" name="book_btn" value="book">
                </fieldset>
            </form>
            <h2 class="uk-heading-divider">Legend: </h2>
            <ul class="uk-list uk-list-divider">
                <li><label><input class="uk-checkbox" type="checkbox">Available</label></li>
                <li><label><input class="uk-checkbox" type="checkbox" checked>Selected</label></li>
                <li><label><input class="uk-checkbox" type="checkbox" disabled>Unavailable</label></li>
            </ul>
        </div>
    </div>
</body>

</html>
