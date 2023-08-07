<!DOCTYPE html>
<html>
<head>
  <title>Display Data</title>
  <link rel="shortcut icon" type="x-icon" href="maintenance.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1><font size='8' color="black" face="Helvetica">Repair Details</font></h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "repair";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM details";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-container'>";
        echo "<div class='table-header'>";
        echo "<div class='table-cell'>Date</div>";
        echo "<div class='table-cell'>Return Date</div>";
        echo "<div class='table-cell'>School</div>";
        echo "<div class='table-cell'>Object</div>";
        echo "<div class='table-cell'>Defect</div>";
        echo "<div class='table-cell'>Quantity</div>";
        echo "<div class='table-cell'>Cost</div>";
        echo "<div class='table-cell'>Actions</div>";
        echo "</div>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='table-row'>";
            echo "<div class='table-cell'>" . $row['cdate'] . "</div>";
            echo "<div class='table-cell'>" . $row['return_date'] . "</div>";
            echo "<div class='table-cell'>" . $row['school'] . "</div>";
            echo "<div class='table-cell'>" . $row['cobject'] . "</div>";
            echo "<div class='table-cell'>" . $row['defect'] . "</div>";
            echo "<div class='table-cell'>" . $row['quantity'] . "</div>";
            echo "<div class='table-cell'>" . $row['cost'] . "</div>";
            echo "<div class='table-cell'><a href='http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=repair&table=details" . $row['cdate'] . "' class='edit-button'>Edit</a></div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<div class='ms'>No data found.</div>";
    }

    mysqli_close($conn);
    ?>
  </div>
</body>
</html>
