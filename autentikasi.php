<?php

$error=''; 

include "config/koneksi.php";
include "model/database.php";
if(isset($_POST['login']))
{               
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    
                    
    $query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "admin")
        {
            header("Location: /view/mahasiswa/index.php");
        }
        else if($row['level'] == "user")
        {
            header("Location: /view/user/index.php");
        }
        else
        {
            $error = "Failed Login";
        }
    }
}           
?>