<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style222.css">
    <title>Expense Tracker</title>
</head>
<body>
    <?php
        include 'dbconn.php';
        session_start();  
        $Username=$_SESSION["Username"];
        $sql="SELECT expen,amount from expense where uname='$Username'";
        $result = mysqli_query($conn, $sql);  
        $sqlBalance="SELECT income,Expen,Tbalance FROM balance where usname='$Username'";
    ?>
    <div class="head"><h2><a href="profile.php">EXPENSE TRACKER</a></h2></div>
    
    <div class="container">
        <h4>Your Balance</h4>
        <?php
            if(mysqli_query($conn, $sqlBalance)){
                if(mysqli_query($conn, $sqlBalance)->num_rows==0){
                    echo "<h1 id='balance'>₹0.00</h1>";
                }else{
                    while($row=mysqli_query($conn, $sqlBalance)->fetch_assoc()){
                        echo "<h1 id='balance'>₹".$row['Tbalance']."</h1>";
                        break;
                    }
                }
            }else{
                echo "<h1 id='balance'>₹0.00</h1>";
            }
        ?>
        <div class="inc-exp-container">
            <div><h4>Income</h4>
                <?php
                    if(mysqli_query($conn,$sqlBalance)){
                        if(mysqli_query($conn,$sqlBalance)->num_rows==0){
                            echo "<p id='money-plus' class='money plus'>₹0.00</p>";
                        }else{
                            while($row=mysqli_query($conn,$sqlBalance)->fetch_assoc()){
                                echo "<p id='money-plus' class='money plus'>₹".$row['income']."</p>";
                                break;
                            }
                        }
                    }else{
                        echo "<p id='money-plus' class='money plus'>₹0.00</p>";
                    }
                ?>
            </div>
        <div>
            <h4>Expense</h4>
                <?php
                    if(mysqli_query($conn,$sqlBalance)){
                        if(mysqli_query($conn,$sqlBalance)->num_rows==0){
                            echo "<p id='money-minus' class='money minus'>₹0.00</p>";
                        }else{
                            while($row=mysqli_query($conn,$sqlBalance)->fetch_assoc()){
                                echo "<p id='money-minus' class='money minus'>₹".$row['Expen']."</p>";
                                break;
                            }
                        }
                    }else{
                        echo "<p id='money-minus' class='money minus'>₹0.00</p>";
                    }
                ?>
            </div>
        </div>
        <h3>Most Spent </h3>
            <?php
                $maxSpentExpen='';
                $maxSpent=0;
                $sqlmaxSpent="SELECT MIN(amount) from expense where uname='$Username' AND amount<0" ;
                if(mysqli_query($conn,$sqlmaxSpent)){
                    if(mysqli_query($conn,$sqlmaxSpent)->num_rows>0){
                        while($row=mysqli_query($conn,$sqlmaxSpent)->fetch_assoc()){
                            $maxSpent=$row['MIN(amount)'];
                            break;
                        }
                    }else $maxSpent=0;
                }else $maxSpent=0;
                if($maxSpent==null){
                    $maxSpent=0;
                }
                $sqlmaxSpent1="SELECT expen from expense where amount=$maxSpent";
                if(mysqli_query($conn,$sqlmaxSpent1)){
                    if(mysqli_query($conn,$sqlmaxSpent1)->num_rows>0){
                        while($row=mysqli_query($conn,$sqlmaxSpent1)->fetch_assoc()){
                            $maxSpentExpen=$row['expen'];
                            break;
                        }
                    }else $maxSpentExpen=null;
                }else $maxSpentExpen=null;

                echo "<ul id='list' class='list'>";
                echo "<li ><span>".$maxSpentExpen."</span>₹".$maxSpent."</li>";

            ?>
        <h3>Least Spent</h3>
        <?php
            $minSpentExpen='';
            $minSpent=0;
            $sqlminSpent="SELECT MAX(amount) from expense where uname='$Username' AND amount<0" ;
            if(mysqli_query($conn,$sqlminSpent)){
                if(mysqli_query($conn,$sqlminSpent)->num_rows>0){
                    while($row=mysqli_query($conn,$sqlminSpent)->fetch_assoc()){
                        $minSpent=$row['MAX(amount)'];
                        break;
                    }
                }else $minSpent=0;
            }else $minSpent=0;
            if($minSpent==null){
                $minSpent=0;
            }
            $sqlminSpent1="SELECT expen from expense where amount=$minSpent";
            if(mysqli_query($conn,$sqlminSpent1)){
                if(mysqli_query($conn,$sqlminSpent1)->num_rows>0){
                    while($row=mysqli_query($conn,$sqlminSpent1)->fetch_assoc()){
                        $minSpentExpen=$row['expen'];
                        break;
                    }
                }else $minSpentExpen=null;
            }else $minSpentExpen=null;

            echo "<ul id='list' class='list'>";
            echo "<li ><span>".$minSpentExpen."</span>₹".$minSpent."</li>";

        ?>
        <h3>History</h3>
        <?php 
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<ul id='list' class='list'>";
                    echo "<li><span id='did'>".$row['expen']."</span>₹".$row['amount']."<button type='submit' class='delete-btn''><a href='delete.php?del={$row['expen']}&am={$row['amount']}'>x</a></button></li>";
                }
            }
        ?>
        <h3>Add new transaction</h3>
        <form id="form" method="post" action="prep.php">
            <div class="form-control">
                <label for="text">Text</label>
                <input type="text" id="text" name="text" placeholder="Enter text..." />
            </div>
            <div class="form-control">
                <label for="amount">Amount <br/>(negative - expense, positive - income)</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount..." />
            </div>
            <button class="btn" type="submit" onclick="addTransaction()">Add transaction</button>
        </form>
    </div>
   
</body>
</html>
<script>
    
 
    function addTransaction(){
        var balance=document.getElementById('balance').innerHTML;
        var text =document.getElementById('text').value;
        var amount =document.getElementById('amount').value;
        var balance = 0;
        var expense= document.getElementById('money-minus').innerHTML;
        var income=document.getElementById('money-plus').innerHTML;
        if(text==""||amount==""){
            alert("Enter Valid details");
        }   
    }
</script>