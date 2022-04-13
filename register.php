
<?php     

$servername="localhost";
$username="root";
$password="";
$dbname="etdata";

$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['mail'];
$pass=$_POST['pass'];

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!($conn)){
    die("connection failed: ". mysqli_connect_error());
}
if($firstname=="" || $lastname==""||$pass==""||$email==""){
    header("Location:register.html");
    
}else{
    $sql="INSERT INTO registration (firstname,lastname,email,pass) VALUES ('$firstname','$lastname','$email','$pass')";
    if(mysqli_query($conn,$sql)){
        header("Location: login.html");}
    else{
        echo "failed to add to database";
    }
}




mysqli_close($conn);
?>
