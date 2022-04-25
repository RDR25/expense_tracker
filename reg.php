<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="etdata";

    $fname=$_POST['fname'];
    $Username=$_POST['username'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!($conn)){
        echo "connection failed". mysqli_connect_error();
    }
    else{
        $sql="INSERT INTO datausers (fname,username,email,pass) VALUES ('$fname','$Username','$mail','$pass')";
        if(mysqli_query($conn,$sql)){
            header("Location: login.html");}
        else{
            echo "failed to add to database";
        }
    }
    mysqli_close($conn);
?>