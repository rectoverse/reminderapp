<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "internship");

if(isset($_POST['submit']))
{
$year=$_POST['year'];
$month=$_POST['month'];
$date=$_POST['date'];
$reminder=$_POST['reminder'];
$sid=$_GET['id'];
mysqli_query($con,"update reminder set year='$year',month='$month',date='$date',reminder='$reminder' where id='$sid'");
?>
<script type="text/javascript">
alert("update successful");
window.location="view.php"
</script>
<?php
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>staff updation</title>
</head>
<body bgcolor="lightgray">

<form action="" method="post">
<?php 

$sid=$_GET['id'];
$res=mysqli_query($con,"select * from reminder where id='$sid'");
if(mysqli_num_rows($res)>0)
{
	$row=mysqli_fetch_array($res);
	
?>

<table width="315" border="0" align="center">
  <tr>
    <th width="106" height="45" scope="row">year</th>
    <td width="193"><input name="year" type="year" value="<?php echo $row['year'];?>" required min="2019"/>&nbsp;</td>
  </tr>
    <tr>
    <th height="52" scope="row">month</th>
    <td><label for="month"></label>
       <input type="number" name="month" value="<?php echo $row['month'];?>" required min="1" max="12"/></td>
  </tr>
  <tr>
    <th height="44" scope="row">date</th>
    <td><label for="date"></label>
      <input type="number" name="date"  value="<?php echo $row['date'];?>" required min="1" max="31"/></td>
	<tr>
  </tr>
  <th height="44" scope="row">reminder</th>
    <td><label for="reminder"></label>
      <input type="text" name="reminder"  value="<?php echo $row['reminder'];?>" required/></td>
	<tr>
  </tr>
 <tr>
    <th height="50" colspan="2" scope="row"><input name="submit" value="update" onClick="return check();" type="submit"  />&nbsp;</th>
    
  </tr>
</table>
<?php
}
?>
</form>

</body>
</html>
 