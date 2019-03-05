<?php
require_once('config.ini.php');
$id=$_GET['id'];
if($id)
{
	$mysqli=new mysqli($host,$dbreader,$dbpassword,"vulnweb");

	// check connection
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	// create a prepared statement
	if($stmt=$mysqli->prepare("select * from userinfo where id=?"))
	{
		$stmt->bind_param("i", $id); // s - string, b - blob, i - int, etc
		$stmt->execute();
		$stmt->bind_result($rid,$rname,$rdes);

		$row=$stmt->fetch();

		if($rid)
		{
			echo "Username:".$rname."<br>";
			echo "Description:".$rdes."<br>";
			echo "Query OK!<br>";
		}
		else echo "No Record!";
	}
	$mysqli->close();
}

/* End of file Case00-NO-SQLI.php */