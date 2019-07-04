<?php
require_once('config.ini.php');
@$username=$_POST['username'];

if($username)
{
	$conn=mysql_connect($host,$dbreader,$dbpassword) or die('Error: ' . mysql_error());
	mysql_select_db("vulnweb", $conn);
	$description=$_POST['description'];
	$SQL="insert into userinfo (username, description) values('".$username."', '".$description."')";
	//echo "SQL=".$SQL."<br>";
	$result=mysql_query($SQL) or die('Error: ' . mysql_error());;
  echo "Added!";
	mysql_close(); 
}
else
{
    ?>
    <form method="POST">
    Add user, please input username and descriotion here:<br />
    <input type="text" name="username" value="" size="30" />
    <br />
    <input type="text" name="description" value=""  size="30" />
    <input type="submit" value="Add" />
    </form>
    <?php
}

/* End of file  */