<html>
<body>
<?php

$username= $_POST['username'];
$password= $_POST['password'];
$matched=0;

$accounts=mysql_connect("localhost", "root", "bit123") or
die(mysql_error());

mysql_select_db("accounts", $accounts);
$sql="SELECT username, password,hname,id from HODS";

$result=mysql_query($sql, $accounts);
while($row=mysql_fetch_array($result))
{
	if($username==$row['username'] and $password== $row['password'])
	{
		$matched=1;
		$hname=$row['hname'];
                $hid=$row['id'];
		
	}
}

if($matched==0)
{
	echo "wrong password";
	exit;
}
	echo "$hname";
?>
<p><center><h1> welcome to booking page</h1></center><br>
<marquee 
behaviour="slide"
direction="right"> welcome <?php echo "$hname"; ?> 
</marquee>


<p>
1.Kuvempu Kalakshetra
2.MBA Seminar Hall
</p>


<form action="p5.php" method="POST">
<b>seminar hall #</b><input type="number" name="sid"><br>
<b>hid</b><input type="number" name="hid" readonly="readonly" value= <?php echo "$hid"; ?> ><br>
<b>topic</b><input type="text" name="topic"><br>
<b>date</b><input type="date" name="date1"><br>
<b>start time</b><input type="time" name="stime"><br>
<b>end time</b><input type="time" name="etime"><br>
<input type="submit" value="book">
</form>
</body>
</html>

