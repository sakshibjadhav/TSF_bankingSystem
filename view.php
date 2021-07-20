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
    <title>All customers</title>
    <style>
        body {
            background-image: url('Images/img1.jpg');
        }

        th {
            background-color: rgb(67, 252, 190);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        tr:nth-child(2n) {
            background-color: rgb(180, 248, 233);
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
    <div class="container">
        <table class="table table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Acc. no</th>
                    <th>User name </th>
                    <th>User email </th>
                    <th>User balance </th>
                    <th>Transfer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'connect.php';
                    $sql="SELECT * FROM `users`";
                    $result=mysqli_query($conn,$sql);

                    while($rows=mysqli_fetch_assoc($result))
                    {
                ?>
                <tr>
                    <td>
                        <?php  echo $rows['user_id'];?>
                    </td>
                    <td>
                        <?php  echo $rows['user_name'];?>
                    </td>
                    <td>
                        <?php  echo $rows['user_email'];?>
                    </td>
                    <td>
                        <?php  echo $rows['user_bal'];?>
                    </td>
                    <td><a href="transfer.php?id=<?php  echo $rows['user_id'];?>"><button type="buton"
                                class="btn btn-primary">Transfer</button></a></td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
    
</body>

</html>