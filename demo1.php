<?php
$servername="localhost";
$username="root";
$password="";
$dbname="etdata";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!($conn)){
    die("connection failed: ". mysqli_connect_error());
}
$sql="SELECT * from expense";
$result = mysqli_query($conn, $sql);  
if($result->num_rows>0){ 
    while($row=$result->fetch_assoc()){
        echo "<h1>id : ".$row["textn"]."  amout ".$row["amount"]."</h1>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>HELLO</p>
    
</body>
</html>