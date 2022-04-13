<?php
$servername="localhost";
$username="root";
$password="";
$dbname="etdata";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!($conn)){
    die("connection failed: ". mysqli_connect_error());
}

$mail = $_POST['mail'];  
$password = $_POST['pass'];  

$sql = "select email,pass from registration where email = '$mail' and pass = '$password'";  
$result = mysqli_query($conn, $sql);  
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        header("Location:index.html");
        echo "<br>name : ".$row["email"]."<br>";
    }}else {
        header("Location:login.html");
    }

?>