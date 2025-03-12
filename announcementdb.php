<?php
    include('db.php');
    session_start();

    if(isset($_POST['update_announcement'])){
        $text = $_POST['$text'];

        $query = "INSERT INTO announcementtbl (text) VALUES ('$text')";
        $result = mysqli_query($connection, $query);

        if($result){
            $_SESSION['$text'] = $text;
            header('location:admindashboard.php?message=updated_announcement');
        }

    }
?>