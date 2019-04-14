<?php
@header('Content-type: text/html;charset=UTF-8');
require_once('config.ini.php');
$id=$_GET['id'];
if($id)
{
    mysql_query("SET NAMES 'UTF8'"); 
	$conn=mysql_connect($host,$dbreader,$dbpassword) or die('Error: ' . mysql_error());
	mysql_select_db("vulnweb");
	$SQL="select * from userinfo where id=".$id;
	$result=mysql_query($SQL) or die('Error: ' . mysql_error());
	$row=mysql_fetch_array($result);
	if($row['id']) 
	{
		?>
		Username: <?php echo $row['username'] ?> 
		<br>
		Description:  <?php echo $row['description'] ?> 
		<br>
	    Query OK!<br>
	  <?php
	}
	else echo "No Record!";
	mysql_free_result($result);
	mysql_close(); 
}
?>
