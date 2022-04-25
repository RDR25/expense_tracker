<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="etdata";

    
    $Username=$_POST['Username'];
    $pass=$_POST['pass'];

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!($conn)){
        echo "connection failed". mysqli_connect_error();
    }
    else{
        $sql = "select username,pass from datausers where username = '$Username' and pass = '$pass'";  
        $result = mysqli_query($conn, $sql);  
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                session_start();
                $_SESSION["Username"] = $Username;
                header("Location:index1.php");
        }
        }else{
            header("Location:login.html");
        }
    }
    mysqli_close($conn);
?>