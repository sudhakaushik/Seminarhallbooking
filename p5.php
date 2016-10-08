<html>
<body>

<?php

$id=$_POST['sid'];
$hid=$_POST['hid'];
$topic=$_POST['topic'];
$date1=$_POST['date1'];
$stime=$_POST['stime'];
$etime=$_POST['etime'];

$accounts=mysql_connect("localhost", "root", "bit123") or
die(mysql_error());

mysql_select_db("accounts", $accounts);

if($id==1)
{
	$sql="SELECT sid, hid, topic, date1, stime, etime
	      FROM bod, seminar_hall
		  WHERE sname='kuvempu kalakshthra'
		  AND shid=sid";
		 
	$flag=1;
	$result=mysql_query($sql, $accounts);
	if($result!=NULL)
	{
	  while($row=mysql_fetch_array($result))
	{

		if($date1==$row['date1'])
		{
			if(($stime>=$row['stime'] and $stime<=$row['etime']) or ($etime>=$row['stime'] and $etime<=$row['etime']))
			{
				$flag=0;
				break;
			}
		}
	}
	}
	if($flag==1)
	{
		$sql1="INSERT into bod(sid,hid,topic,date1,stime,etime) values('$id','$hid','$topic','$date1','$stime','$etime')";
		mysql_query($sql1,$accounts);
		echo "Booking successful";
		mysql_close($accounts);
	}
	else
	{
		echo "booking failed";
	}
}
else if($id==2)
{
	$sql="SELECT sid, hid, topic, date1, stime, etime
	      FROM bod, seminar_hall
		  WHERE sname='mba seminar hall'
		  AND shid=sid";
		 
	$flag=1;
	$result=mysql_query($sql, $accounts);
	if($result!=NULL)
	{
	  while($row=mysql_fetch_array($result))
	{

		if($date1==$row['date1'])
		{
			if(($stime>=$row['stime'] and $stime<=$row['etime']) or ($etime>=$row['stime'] and $etime<=$row['etime']))
			{
				$flag=0;
				break;
			}
		}
	}
	}
	if($flag==1)
	{
		$sql1="INSERT into bod(sid,hid,topic,date1,stime,etime) values('$id','$hid','$topic','$date1','$stime','$etime')";
		mysql_query($sql1,$accounts);
		echo "Booking successful";
		mysql_close($accounts);
	}
	else
	{
		echo "booking failed";
	}
}
?>
</body>
</html>