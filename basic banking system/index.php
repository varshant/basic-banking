<?php
 $insert = false;
if(isset($_POST['name']))
{
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname="spark";

     $conn = mysqli_connect($server, $username, $password, $dbname);

    // Check for connection success
    if(!$conn){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables

        $name = $_POST['name'];
        $mail = $_POST['mail'];
       $balance = $_POST['balance'];
    
         if ( $name=="" || $mail=="" || ($balance) <= 0) {
             $insert=false;}
          
    else {
    $sql = "INSERT INTO `dummyusers` (`name`,`mail`, `balance`) VALUES ('$name', '$mail', '$balance');";

    if($conn->query($sql) == true){
        $insert=true;
    }

    else{
        echo "error :$sql <br> $conn->error";
    }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Form</title>
    <link rel="stylesheet" href="style1.css">

    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    
<header>
    <div class="navbar fixed-top navbar-dark bg-dark">
      
      <img src="banksymbol.png" alt="" width="50" height="50" class="mx-3 d-inline-block align-top">
      <a class="navbar-brand" href="#">Sparks Bank</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <h5>New Users</h5>
        </li>
      </ul>
      <a class="navbar-brand" href="index.html">Home</a>
      <a class="navbar-brand" href="customer.php">All Users</a>
    <a class="navbar-brand" href="txnhistory.php">Txn History</a>
  </div>
  </header>
    <img class="bg" src="bank.jpg" alt="Sparks Bank">
    <div class="container">
        <h1>Welcome to spark bank</h3>
        <p>Enter the details and submit this form for the comfirmation of account in our bank </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form</p>";
        }
       else
            echo "<p class='invalid'>please enter valid values and deposit amount atleast Rs 500</p>";
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="mail" name="mail" id="mail" placeholder="Enter your email">
            <input type="text" name="balance" id="balance" placeholder="Enter deposit amount">
            <button id="bt">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>