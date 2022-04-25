<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style222.css"> 
    <style>
        h4{
            padding-top:10px;
            padding-bottom: 5px ;
            margin-bottom: 5px;
        }
        
        a:hover{
            text-decoration: none;
            background-color: white;
            color: rgb(43, 137, 226);
        }
        a{
            color:white;
            background-color: rgb(43, 137, 226);
        }
    </style>
    <title>Expense Tracker</title>
</head>
<body>
    <div class="head">
        <h2>EXPENSE TRACKER</h2>
    </div>
    <?php
        include 'dbconn.php';
        session_start();
        echo "<h3 style='text-align:center'>Hello ".$_SESSION['Username']."</h3>";
        $sql ="SELECT fname,username,email FROM datausers where username='$_SESSION[Username]'";
        if(mysqli_query($conn,$sql)){
            while($row=mysqli_query($conn,$sql)->fetch_assoc()){
                echo "<h4 style='text-align:center'>NAME     :".$row['fname']."</h4>";
                echo "<h4 style='text-align:center'>USERNAME :".$row['username']."</h4>";
                echo "<h4 style='text-align:center'>EMAIL    :".$row['email']."</h4>";
                break;
            }
        }
    ?>
    <button class="btn" style="width:fit-content" type="submit"><a href="logout.php">LOGOUT</a></button>
</body>
</html>