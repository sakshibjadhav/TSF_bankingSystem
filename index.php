<?php
error_reporting(0);
?>
<?php
        include 'connect.php';
        if($_SERVER['REQUEST_METHOD']=='POST')
        {

            $name=$_POST['Name'];
            $email=$_POST['email'];
            $bal=$_POST['bal'];
            
            $sql="INSERT INTO `users`(`user_name`, `user_email`, `user_bal`) VALUES ('$name','$email','$bal')";
            $result=mysqli_query($conn,$sql);
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Banking System</title>
    <style>
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
    if($result)
    {
        ?>
           <div class="alert alert-success" role="alert">
            Account created successfully!
            </div>
    <?php
    }
    ?>
    <div class="container">

        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="img-responsive" src="Images/img7.jpg" alt="" width="450" height="340">
                    
                </div>
                <div class="item">
                    <img class="img-responsive" src="Images/img4.jpg" alt="" width="450" height="340">
                    
                </div>
                <div class="item">
                    <img class="img-responsive" src="Images/img2.jpg" alt="" width="450" height="340">
                    
                </div>
                
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome</h1>
            <p class="lead">Our bank is nationalize bank. We provide all the facilities. You can easily transfer money. </p>
            <hr class="my-4">
            <p>Be a part of all our customer family. Create your account.</p>
            <p class="lead">
            <button class="btn btn-primary p-4" type="button" data-toggle="collapse" data-target="#user">Create user</button><br>
            </p>
        </div>
        
        <div id="user" class="collapse">

            <form action="index.php" method="post" role="form" class="form-horizontal">
                <div class="form-group">
                    <label for="n">Name</label>
                    <input type="text" name="Name" autocomplete="off" class="form-control" id="n">
                </div>
                <div class="form-group">
                    <label for="e">Email-id</label>
                    <input type="email" name="email" autocomplete="off" class="form-control" id="e">
                </div>
                <div class="form-group">
                    <label for="b">Current Balance</label>
                    <input type="text" name="bal" autocomplete="off" class="form-control" id="b">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            
        </div>
        <div class="row">
            <div class="col-sm-7">
                <img src="Images/img5.jpg" alt="" width="400px">
            </div>
            <div class="col-sm-5">
                <h3>Now you can tranfer money in just few minutes.Click below to transfer money, select customer and enter amount.</h3>
                <a href="view.php"><button class="btn btn-primary">Tranfer Money</button></a>
            </div>
        </div>
    </div> 
    <footer>
        <p>&copy;Sakshi Jadhav</p>
        <h4>The Sparks Foundation</h4>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
