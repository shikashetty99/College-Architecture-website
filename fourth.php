<?php
$roomno="";
$deptid="";
$roomaddress="";
$presentbranch="";

$con=mysqli_connect("localhost","root","","collegeproject","3307");
if($con)
echo "connected";



function getPost()
{
$posts=array();
$posts[0]=$_REQUEST['roomno'];
$posts[1]=$_REQUEST['deptid'];
$posts[2]=$_REQUEST['roomaddress'];
$posts[3]=$_REQUEST['presentbranch'];
return $posts;
}




if(isset($_REQUEST["insert"]))
{

$data1=getPost();
$roomno=$data1[0];
$deptid=$data1[1];
$roomaddress=$data1[2];
$presentbranch=$data1[3];
$sql="insert into rooms(room_no,dept_id,room_address,present_branch)values('$roomno','$deptid','$roomaddress','$presentbranch')";
$final=mysqli_query($con,$sql);
if($final)
echo "inserted";

}


if(isset($_REQUEST["delete"]))
{

$data2=getPost();
$roomno=$data2[0];
$sql="delete from rooms where room_no='$roomno'";
$final=mysqli_query($con,$sql);
if($final)
echo "deleted";
else
echo "not deleted";


}


if(isset($_REQUEST["update"]))
{

$data3=getPost();
$roomno=$data3[0];
$deptid=$data3[1];
$roomaddress=$data3[2];
$presentbranch=$data3[3];
$sql="update rooms set dept_id=$deptid,room_address=$roomaddress,present_branch='presentbranch' where room_no='$roomno'";
$final=mysqli_query($con,$sql);
if($final)
	
echo "updated";


}



if(isset($_REQUEST['search']))
{

$data=getPost();
$sql1="select * from rooms where room_no='$data[0]'";
$result=mysqli_query($con,$sql1);

if($result)
{
 if(mysqli_num_rows($result))
{
while($row=mysqli_fetch_array($result))
{
 $roomno=$row['room_no'];
$deptid=$row['dept_id'];
$roomaddress=$row['room_address'];
$presentbranch=$row['present_branch'];

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
<body background="http://static1.businessinsider.com/image/545a74876da811b02d8b457b/heres-what-a-single-course-costs-a-4-year-student-at-the-most-expensive-colleges-in-the-us.jpg">
	<div class="wrapper">
		<div class="header-area">
		<p>ROOM NO</p>
			<p>DEPT ID</p>
			<p>ROOM ADDRESS</p>
			<p>PRESENTBRANCH</p>
			
			</div>
		
		<div class="form-area">


			<form action="fourth.php" method="post">
			<input type="text" name="roomno" value="<?php echo $roomno;?>" autocomplete="off">
		    <input type="text" name="deptid" value="<?php echo $deptid;?>"autocomplete="off">
			<input type="text" name="roomaddress" value="<?php echo $roomaddress;?>"autocomplete="off">
			<input type="text" name="presentbranch" value="<?php echo $presentbranch;?>" autocomplete="off"><br><br>
			
			<button value="insert" name="insert">Save</button>


			<button value="delete" name="delete">Delete</button>
            

			<button value="update" name="update">Modify</button>
             
             <button value="search" name="search">Search</button>
             <br><br>

             
             <a href="homepage.php"><button value="back" name="back">Back</a></button>

			
			</form>
			
                         
		</div>
	</div>



</body>
</html>
