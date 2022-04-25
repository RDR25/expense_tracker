<?php
$servername="localhost";
$username="root";
$password="";
$dbname="etdata";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!($conn)){
    die("connection failed: ". mysqli_connect_error());
}else{
    $text=$_POST['text'];
    $amount=$_POST['amount'];
    echo $text."fskhgabkj".$amount;
    session_start();
    $Username=$_SESSION["Username"];
    if($text==""||$amount==""){
        header("Location:index1.html");
    }else{
        $sqlq="SELECT * FROM balance where usname='$Username'";
        $sqld="INSERT INTO expense (uname,expen,amount) VALUES('$Username','$text','$amount')";
        if(mysqli_query($conn,$sqld)){
            echo "success";
        }
        if(mysqli_query($conn,$sqlq)){
           // echo "satdfylguihop";
            if(mysqli_query($conn,$sqlq)->num_rows>0){
                while($row=mysqli_query($conn,$sqlq)->fetch_assoc()){
                    $income=$row['income'];
                    $expen=$row['Expen'];
                    $Tbalance=$row['Tbalance'];
                    break;
                }
                echo "satdfylguihop";
                if($amount>0){
                    $total=$Tbalance+$amount;
                    $sqlamount="UPDATE balance SET income=income+$amount,Tbalance=$total";
                }else{
                    $total=$Tbalance+$amount;
                    $sqlamount="UPDATE balance SET Expen=Expen+$amount,Tbalance=$total";
                }
                if(mysqli_query($conn,$sqlamount)){
                    header("Location:index1.php");
                }
            }
            else{
                echo "satdfylguihop";
                if($amount>0){
                    $sqladd="INSERT INTO balance(usname,income,Expen,Tbalance) VALUES('$Username',$amount,0,$amount)";
                }else{
                    $sqladd="INSERT INTO balance(usname,income,Expen,Tbalance) VALUES('$Username',0,$amount,$amount)";
                }
                if(mysqli_query($conn,$sqladd)){
                    header("Location:index1.php");
                }
        }
        }

    }
}
    



?>