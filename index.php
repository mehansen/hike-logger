<?php
if($_POST['submitbutton'] == 'Submit')
{
    $errormsg = "";
    $varName = $_POST['name'];
    $varDate = $_POST['date'];
    $varDistance = $_POST['distance'];

    if(empty($varName) || empty($varDate) || empty($varDistance)) {
        $errormsg = "Please provide values for all fields";
    } else {
        // connect to db 
        $conn = mysqli_connect("127.0.0.1", "hikelogclient", "pass", "hikelog");
        if (!$conn) die("Connection failed: ". mysqli_connect_error());
        $sql = "INSERT INTO hikes (hiker, date, length) VALUES  (\"" . $varName . "\", '" . $varDate . "', " . $varDistance . ")";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hike Log</title>
</head>

<body>
    <?php
        if(!empty($errormsg)) {
            echo("<p>" . $errormsg . "</p>");
        }
    ?>
    <h1>Hike Log</h1>
    <p>Please input hike information.</p>
    <form method='post' action='index.php' >
        <p>
        Name: <input type='text' name='name' value="<?=$varName;?>" />
        </p>
        <p>
        Date: <input type='date' name='date' value="<?=$varDate;?>" />
        </p>
        <p>
        Distance: <input type='numer' name='distance' value="<?=$varDistance;?>"/>
        </p>
        <p>
        <input type='submit' name='submitbutton' value='Submit' />
        </p>
    </form>
    <form action='report.php' >
        <input type ='submit' value='View All Logged Hikes' />
    </form>
</body>

</html>