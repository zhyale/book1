<?php
require_once('config.ini.php');
$id=$_GET['id'];
if($id)
{
	$conn=mysqli_connect($host,$dbreader,$dbpassword, "vulnweb");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$SQL="select * from userinfo where id=".$id;
	//echo "SQL=".$SQL."<br>";
	
	if(mysqli_multi_query($conn, $SQL))
	{
		if($result=mysqli_store_result($conn))
		{
			if($row=mysqli_fetch_row($result))
			{
				echo "Username:".$row[1]."<br>";
		    echo "Description:".$row[2]."<br>";
	      echo "Query OK!<br>";
			}
			else echo "No Record!";
		}
	}
	mysqli_close($conn);
}
// End of file