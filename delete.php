
<?php
    include 'dbconn.php';
    $dq=$_GET['del'];
    $da=(int)$_GET['am'];
    session_start();
    $Username=$_SESSION['Username'];
    $sqld="SELECT * from balance where usname='$Username'";
    $sqldel="DELETE FROM expense where expen='$dq' AND amount=$da";
    if(mysqli_query($conn, $sqld)->num_rows==0){
        $sqlup="DELETE FROM balance where usname='$Username'";
    }else if($da>0){
        $sqlup="UPDATE balance SET income=income-$da,Tbalance=Tbalance-$da";
    }else{
        $sqlup="UPDATE balance SET Expen=Expen-$da,Tbalance=Tbalance-$da";
    }

    if(mysqli_query($conn, $sqlup) && mysqli_query($conn,$sqldel)){
        header("Location:index1.php");
    }
?>