<?php
    include('db.php');
    session_start();

    if(isset($_POST['sit-in'])){
        $idno = $_SESSION['idno'];
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $sessions = $_SESSION['sessions'];
        $purpose = $_POST['purpose'];
        $labs = $_POST['labs'];


        $sessions--;
        $date = date('y-m-d');
        date_default_timezone_set("America/New_York");
        $login_date = date("h:i:sa");

        $query = "UPDATE userstbl
                  SET purpose = '$purpose', labs = '$labs', sessions = '$sessions', date_login = '$date', login_date = '$login_date'
                  WHERE idno = '$idno'";
        $result = mysqli_query($connection, $query);

        if($result){
            $_SESSION['sessions'] = $sessions;
            $_SESSION['purpose'] = $purpose;
            $_SESSION['labs'] = $labs;
            $_SESSION['date'] = $date;
            $_SESSION['login_date'] = $login_date;

            header('location:admindashboard.php?idnum'. $idno);
        }else{
            echo "<script>alert('Error Submitting Record'); window.location.href = 'admindashboard.php';</script>";
        }
    }
?>