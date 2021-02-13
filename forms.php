<?php
//Database Connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "qrcode";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $db);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// if (isset($_GET)) {
//   $sql = "SELECT * FROM staffs WHERE id=" . $_GET['id'];
//   $stmt = $conn->prepare($sql);
//   $stmt->execute();
//   $result = $stmt->get_result();
// printArr($result);


//   if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//       echo "<pre>";
//       print_r($row);
//       echo "</pre>";
//     }
//   }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forms</title>
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="text" name="name" />
    <label for="NO">NO</label>
    <input type="radio" name="vote" id="NO" value="NO" />
    <label for="YES">YES</label>
    <input type="radio" name="vote" id="YES" value="YES" />
    <input type="range" name="range" id="" />
    <label for="absent">absent</label>
    <input type="checkbox" name="late" id="absent" />
    <label for="present">present</label>
    <input type="checkbox" name="late" id="present" />
    <input type="date" name="date" />

    <input type="submit" value="submit" />
    <input type="button" value="button" />
  </form>
</body>

</html>