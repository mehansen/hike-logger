<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hike Log Report</title>
</head>

<body>
  <?php
  $servername = "127.0.0.1";
  $username = "hikelogclient";
  $password = "pass";
  $dbname = "hikelog";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM hikes";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "hiker: " . $row["hiker"]. " - date: " . $row["date"]. " - length: " . $row["length"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
  ?>

  <form action='index.php' >
    <input type="submit" value="Return to Input" />
  </form>
</body>


