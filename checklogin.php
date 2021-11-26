<?php
    session_start();
    include "connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "$username";

    $query = mysqli_query($connect, "SELECT * FROM staff WHERE username = '$username' && password = '$password'")
        or die (mysqli_error($connect));

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['phone_num'] = $phone_num;
        header("location:homepage.php");
    }
    else {
        header("location:index.php?message=not_login");
    }
?>