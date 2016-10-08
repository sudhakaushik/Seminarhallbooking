<html>
<body>

<form action="p2.php" method="GET">
<input type="date" name="date1"><br>

<input type="submit" value="check">

</form>

<?php

$sname='mba seminar hall';
	if(isset($_GET['date1']))
	{ 
                
 		$date1=$_GET['date1'];
		echo "$date1"."<br>";
		$accounts=mysql_connect("localhost","root","bit123") or
		die(mysql_error());
		mysql_select_db("accounts",$accounts);
		$sql="SELECT stime, etime,date1, topic, hname, contact_no, dept
			  FROM hods , bod , seminar_hall 
			  WHERE sname='mba seminar hall'
			  AND sid=shid
			  AND hid=id";
		$result=mysql_query($sql,$accounts);
		if ($result != NULL)
		while($row=mysql_fetch_array($result))
		{
			if($date1==$row['date1'])
			echo $row['stime']."\t".$row['etime']."\t".$row['topic']."\t".$row['hname']."\t".$row['contact_no']."\t".$row['dept']."<br>";
		}
	}
	
?>

<p align="right">
  

<form action='p4.php' method="POST">
<b>username: </b> <input type="text" name="username"><br>
<b>password: </b> <input type="password" name="password"><br>
<input type="submit">
</form>
</p>

</body>
</html>