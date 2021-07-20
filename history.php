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
    <title>Transaction History</title>
    <style>
        body{
            background-color:rgb(179, 242, 253);
        }
        th{
            background-color: rgb(252, 167, 245);
        }
        tr:nth-child(2n){
            background-color: rgb(250, 215, 241);
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
                    <li><a href="view.php">View users</a></li>
                    <!-- <li><a href="transfer.php">Tranfer Money</a></li> -->
                    <li><a href="history.php">Transaction History</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    $conn=mysqli_connect("localhost","root","","bankingsystem");
        
        
    ?>
    <div class="container">
        <table class="table table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Sender's name</th>
                    <th>Sender's Acc no. </th>
                    <th>Receiver's name</th>
                    <th>Receiver's Acc no.</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $q="SELECT * FROM `transaction_history`";
                    $r=mysqli_query($conn,$q);

                    while($rows=mysqli_fetch_assoc($r))
                    {
                ?>
                        <tr>
                           <td><?php  echo $rows['sender'];?></td>
                           <td><?php  echo $rows['sender_id'];?></td>
                           <td><?php  echo $rows['receiver'];?></td>
                           <td><?php  echo $rows['receiver_id'];?></td>
                           <td><?php  echo $rows['amount'];?></td>
                           <td><?php  echo $rows['date and time'];?></td>
                       </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>

</body>
</html>
       