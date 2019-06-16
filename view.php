<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "internship");     

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<body>
<form action="" method="post">
<input type="submit" name="search"  value="SHOW ALL REMINDERS">

<table width="724" border="0">
  <tr>
    <th width="74" height="57" scope="col"><div align="left">year</div></th>
    <th width="160" scope="col"><div align="left">month</div></th>
    <th width="135" scope="col"><div align="left">date</div></th>
	<th width="72" scope="col"><div align="left">reminder</div></th>
  </tr>
  <?php
  if (isset($_POST['search']))
{
 
  $res=mysqli_query($con,"select * from reminder");//select all details of one person from table 
  if(mysqli_num_rows($res)>0)//if id of the person is >0(id starts from 0) then select all attributes of that id
  {
	  while($row=mysqli_fetch_array($res))
	  {
		  
  ?>
</div>
<tr>
    <td height="49"><?php echo $row['year']; ?>&nbsp;</td>
    <td><?php echo $row['month']; ?>&nbsp;</td>
    <td><?php echo $row['date']; ?>&nbsp;</td>
	<td><?php echo $row['reminder']; ?>&nbsp;</td>
    
<td><a href="update.php?id=<?php echo $row['id'];?>">update</a>&nbsp;</td>    
      </tr>
  <?php
	  }
  }
}
  ?>
</table>
</form>
</body>
</html>
