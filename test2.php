<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movie";
$result = $conn->query($sql);
        $rows = [];
        while($row = mysqli_fetch_array($result))
        {
            $rows[] = $row;
        }
        echo $rows[4]['name'];
        echo $rows[4]['imageUrl'];
$conn->close();
?>
<?php
  $one="this is normal string";
  $two = crypt($one,'beebo');
  echo $one;
  echo "\n".$two;
?>