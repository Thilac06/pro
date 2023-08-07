
<html>
<head>
  <title>data</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "repair";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $date = $_POST["date"];
    $returnDate = $_POST["rdate"];
    $school = $_POST["school"];
    $object = $_POST["object"];
    $defect = $_POST["defect"];
    $quantity = $_POST["quantity"];
    $cost = $_POST["cost"];

    

    
    $sql = "INSERT INTO details (cdate, return_date, school, cobject, defect, quantity, cost)
            VALUES ('$date', '$returnDate', '$school', '$object', '$defect', '$quantity', '$cost')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='ms'>Data inserted successfully!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
    mysqli_close($conn);
}
?>


</body>
</html>
