<?php
    include 'connect.php';

    if(isset($_POST['submit']))
    {
        $sender_id=$_GET['id'];
        $receiver_id=$_POST['receiver'];
        $amount=$_POST['amount'];

        $sql1="SELECT * FROM `users` WHERE `user_id`=$sender_id";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);

        $sql2="SELECT * FROM `users` WHERE `user_id`=$receiver_id";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);

        if(($amount)<0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Negative values cannot be transferred")'; 
            echo '</script>';
        }
        else if(($amount)==0)
            {
                echo '<script type="text/javascript">';
                echo ' alert("Oops! 0 values cannot be transferred")';  
                 echo '</script>';
            }
            else if(($amount)>$row1['user_bal'])
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("Oops! not sufficient balance")';  
                    echo '</script>';
                }
                else
                {
                    $curr_bal1=$row1['user_bal']-$amount;
                    $bal_1="UPDATE `users` SET `user_bal`=$curr_bal1 WHERE `user_id`=$sender_id";
                    mysqli_query($conn,$bal_1);

                    $curr_bal2=$row2['user_bal']+$amount;
                    $bal_2="UPDATE `users` SET `user_bal`=$curr_bal2 WHERE `user_id`=$receiver_id";
                    mysqli_query($conn,$bal_2);

                    $sname=$row1['user_name'];
                    $rname=$row2['user_name'];

                    $ins_q="INSERT INTO `transaction_history`(`sender`, `sender_id`, `receiver`, `receiver_id`, `amount`, `date and time`) VALUES ('$sname','$sender_id','$rname','$receiver_id','$amount',now())";
                    $ins_r=mysqli_query($conn,$ins_q);

                    if($ins_r)
                    {
                        echo "<script>alert('Transaction successful');</script>";
                    }
                }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/index.css">
    <title>Transfer Money</title>
    <style>
        .form-control{
            border:3px solid black;
        }
        h4,select{
            font-size:20px;
            font-weight: bold;
            color:black;
        }
        label,option{
            font-size:15px;
            font-weight:bold;
        }
        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><li><img src="Images/img8.png" alt="" width="30px" height="30px"> TSF Bank</li></a>

            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="view.php">view users</a></li>
                    <!-- <li><a href="transfer.php">Tranfer Money</a></li> -->
                    <li><a href="history.php">Transaction History</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <img src="Images/img3.jpg" alt="" width="100%" height="450px">
    </div>
    <div class="container">

        <?php
            include 'connect.php';
            $s_id=$_GET['id'];
            $sql="SELECT * FROM `users` WHERE `user_id`=$s_id";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

        ?>
        <form method="post" name="credit">
            <h4>Sender</h4>
            <table class="table table-hover table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Acc no</th>
                        <th>Name </th>
                        <th>Email id</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['user_id'];?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['user_email'];?></td>
                        <td><?php echo $row['user_bal'];?></td>
                    </tr>
                </tbody>
            </table>
            <h4>Receiver</h4>
            <div class="form-group">
                <label for="rn">Name and Acc. no</label><br>
                <select name="receiver" id="receiver" class="form-control">
                    <?php
                        $q="SELECT `user_id` ,`user_name`FROM `users`;";
                        $r=mysqli_query($conn,$q);
                        while($receiver=mysqli_fetch_assoc($r))
                        {
                    ?>
                            <option value="<?php echo $receiver['user_id'];?>">
                            <?php echo $receiver['user_name']." Acc no= ".$receiver['user_id'];?>
                            </option>
                            
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="a">Amount</label>
                <input type="text" name="amount" class="form-control" id="a" autocomplete="off">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Transfer</button>
        </form>
    </div>
    
</body>
</html>