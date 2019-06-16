<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST["submit"]))
{

$year=$_POST["year"];
$month=$_POST["month"];
$date=$_POST["date"];
$reminder=$_POST["reminder"];

$sql = "INSERT INTO  reminder(year,month,date,reminder)
VALUES ('$year','$month','$date','$reminder')";



if ($conn->query($sql) === TRUE) {
    echo "REMINDER ADDED";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<body>


  <form method ="post">
  <table>
    <tr>
      <td align="right">Year:</td>
      <td align="left"><input type="number" name="year" id="year" required min="2019"/></td>
    </tr>
    <tr>
      <td align="right">month in number:</td>
      <td align="left"><input type="number" name="month" id="month" required min="1" max="12">		</td>
    </tr>
    <tr>
      <td align="right">date:</td>
      <td align="left"><input type="number" name="date" id="date" required min="1" max="31"></td>
    </tr>	
	<tr>
      <td align="right">reminder:</td>
      <td align="left"><input type="text" name="reminder" id="reminder" required></td>
    </tr>	
<tr>
<td align="right"><input type="submit" name="submit" onclick="myFunction()" value="submit"></td></tr>
<button type="button" onclick="window.location.href='view.php'">View</button>
  </table>
</form>

<script>
function myFunction() {
  var p = document.getElementById("year").value; 
  var q = document.getElementById("month").value; 
  var r = document.getElementById("date").value; 


var x=new Date();
x.setFullYear(p,q-1,r);
var today = new Date();

if (x>today)
  {
  alert((x - today) / 1000 / 60 / 60 / 24+ "days left");
  }
else if (x<today)
  {
  alert("you missed the day");
  }
else {
  alert("This is the day");
  }

}
</script>
</body>
</html>
