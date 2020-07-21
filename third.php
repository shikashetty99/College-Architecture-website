<?php
$staffname="";
$deptid="";
$staffaddress="";
$designation="";
$con=mysqli_connect("localhost","root","","collegeproject","3307");
if($con)
echo "connected";
else
echo "not connected";

function getPost()
{
$posts=array();
$posts[0]=$_REQUEST['staffname'];
$posts[1]=$_REQUEST['deptid'];
$posts[2]=$_REQUEST['staffaddress'];
$posts[3]=$_REQUEST['designation'];
return $posts;
}


if(isset($_REQUEST["insert"]))
{

$data1=getPost();
$staffname=$data1[0];
$deptid=$data1[1];
$staffaddress=$data1[2];
$designation=$data1[3];
$sql="insert into staffroom(staff_name,dept_id,staff_address,designation)values('$staffname','$deptid','$staffaddress','$designation')";
$final=mysqli_query($con,$sql);
if($final)
echo "inserted";

}




if(isset($_REQUEST["delete"]))
{

$data2=getPost();
$staffname=$data2[0];
$sql="delete from staffroom where staff_name='$staffname'";
$final=mysqli_query($con,$sql);
if($final)
echo "deleted";
else
echo "not deleted";


}





if(isset($_REQUEST["update"]))
{

$data3=getPost();
$staffname=$data3[0];
$deptid=$data3[1];
$staffaddress=$data3[2];
$designation=$data3[3];
$sql="update staffroom set deptid='$deptid',staffaddress='$staffaddress',designation='$designation' where staff_name='$staffname'";
$final=mysqli_query($con,$sql);
if($final)
echo "updated";


}



if(isset($_REQUEST['search']))
{

$data=getPost();
$sql1="select * from staffroom where staff_name='$data[0]'";
$result=mysqli_query($con,$sql1);

if($result)
{
 if(mysqli_num_rows($result))
{
while($row=mysqli_fetch_array($result))
{
 $staffname=$row['staff_name'];
$deptid=$row['dept_id'];
$staffaddress=$row['staff_address'];
$designation=$row['designation'];

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

<body background="http://d3vgmmrg377kge.cloudfront.net/about/PublishingImages/campus-donors/keyssar_hbs_072_1280.jpg">
	<div class="wrapper">
		<div class="header-area">
		<p>STAFF NAME</p>
			<p>DEPT ID</p>
			<p>STAFF ADDRESS</p>
			<p>DESIGNATION</p>
			
			</div>
		
		<div class="form-area">


			<form action="third.php" method="post">
			<input type="text" name="staffname" value="<?php echo $staffname;?>" autocomplete="off">
		    <input type="text" name="deptid" value="<?php echo $deptid;?>"autocomplete="off">
			<input type="text" name="staffaddress" value="<?php echo $staffaddress;?>"autocomplete="off">
			<input type="text" name="designation" value="<?php echo $designation;?>" autocomplete="off"><br><br>
			
			<button value="insert" name="insert">Save</button>

			<button value="delete" name="delete">Delete</button>

			<button value="update" name="update">Modify</button>

			<button value="search" name="search">Search</button>
			<br><br>

             <a href="homepage.php"><button value="back" name="back">Back</a></button>

             <a href="staffdetails.php"><button value="back" name="back">Next</a></button>


			</form>
			

		</div>
	</div>



</body>
</html>
