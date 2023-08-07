<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    
  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "repair";
    
    $date=$_POST['date'];
    $rdate=$_POST['rdate'];
    $school=$_POST['school'];
    $object=$_POST['object'];
    $defect=$_POST['default'];
    $quantity=$_POST['quantity'];
    $cost=$_POST['cost'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO details (Date,RDate,school,object,default,quantity,cost)
    VALUES ($date,$date,$school,$object,$defect,$quantity,$cost);";
    
    if (mysqli_query($conn, $sql)) {
      echo "<div class='ms'>save successfully</div>";
    }
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    ?> 

</body>
</html>