<?php

$labno="";
$deptid="";
$floorno="";
$labaddress="";
$maxcapacity="";
$con=mysqli_connect("localhost","root","","collegeproject","3307");
if($con)
echo "connected";





function getPost()
{
$posts=array();
$posts[0]=$_REQUEST['labno'];
$posts[1]=$_REQUEST['deptid'];
$posts[2]=$_REQUEST['floorno'];
$posts[3]=$_REQUEST['labaddress'];
$posts[4]=$_REQUEST['maxcapacity'];
return $posts;
}



if(isset($_REQUEST["insert"]))
{

$data=getPost();
$labno=$data[0];
$deptid=$data[1];
$floorno=$data[2];
$labaddress=$data[3];
$maxcapacity=$data[4];
$sql1="insert into deptlabs(lab_no,dept_id,floor_no,lab_address,max_capacity)values('$labno','$deptid',$floorno,'$labaddress',$maxcapacity)";
$final=mysqli_query($con,$sql1);
if($final)
echo "inserted";
else
echo "not inserted";

}


if(isset($_REQUEST["delete"]))
{

$data2=getPost();
$labno=$data2[0];
$sql="delete from deptlabs where lab_no='$labno'";
$final=mysqli_query($con,$sql);
if($final)
echo "deleted";
else
echo "not deleted";


}



if(isset($_REQUEST["update"]))
{

$data3=getPost();
$labno=$data3[0];
$deptid=$data3[1];
$floorno=$data3[2];
$labaddress=$data3[3];
$maxcapacity=$data3[4];
$sql="update deptlabs set dept_id=$deptid,floor_no=$floorno,lab_address='$labaddress',max_capacity=$maxcapacity where labno='$labno'";
$final=mysqli_query($con,$sql);
if($final)
echo "updated";


}




if(isset($_REQUEST['search']))
{

$data3=getPost();
$sql3="select * from deptlabs where lab_no='$data3[0]'";
$result=mysqli_query($con,$sql3);

if($result)
{
 if(mysqli_num_rows($result))
{
while($row=mysqli_fetch_array($result))
{
 $labno=$row['lab_no'];
$deptid=$row['dept_id'];
$floorno=$row['floor_no'];
$labaddress=$row['lab_address'];
$maxcapacity=$row['max_capacity'];

}
}
else
{
echo "no data found";
}
}
else
{
echo "error";

}
}








?>





<!DOCTYPE html>
<html>
<head>
	<title>My forms</title>
	<link rel="stylesheet" type="text/css" href="form2.css">
</head>
<body background="http://www.designshare.com/portfolio/project/1/800/825-2.jpg">
	<div class="wrapper">
		<div class="header-area">
			<p>LAB NO</p>
			<p>DEPT ID</p>
			<p>FLOOR NO</p>
			<p>LAB ADDRESS</p>
			<p>MAX CAPACITY</p>
			
			</div>
		
		<div class="form-area">
			<form action="second.php" method="post">
			<input type="text" name="labno" value="<?php echo $labno;?>"autocomplete="off">
		    <input type="text" name="deptid" value="<?php echo $deptid;?>" autocomplete="off">
			<input type="text" name="floorno" value="<?php echo $floorno;?>"autocomplete="off">
			<input type="text" name="labaddress" value="<?php echo $labaddress;?>"autocomplete="off">
			<input type="text" name="maxcapacity"value="<?php echo $maxcapacity;?>"autocomplete="off">
			<br><br>
			<button value="insert" name="insert">Save</button>

			<button value="delete" name="delete">Delete</button>

			<button value="update" name="update">Modify</button>

			<button value="search" name="search">Search</button>
			<br><br>

			<a href="homepage.php"><button value="back" name="back">Back</a></button>

			<a href="labdetails.php"><button value="next" name="next">Next</a></button>


				</form>
			
		

		</div>
	</div>



</body>
</html>
