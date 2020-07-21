<?php
$deptid="";
$floorno="";
$noofrooms="";
$depthead="";

$con=mysqli_connect("localhost","root","","collegeproject","3307");
if($con)
echo "connected";


function getPost()
{
$posts=array();
$posts[0]=$_REQUEST['deptid'];
$posts[1]=$_REQUEST['floorno'];
$posts[2]=$_REQUEST['noofrooms'];
$posts[3]=$_REQUEST['depthead'];
return $posts;
}


if(isset($_REQUEST["search"]))
{

$data=getPost();
$sql1="select * from dept where dept_id='$data[0]'";
$result=mysqli_query($con,$sql1);

if($result)
{
 if(mysqli_num_rows($result))
{
while($row=mysqli_fetch_array($result))
{
 $deptid=$row['dept_id'];
$floorno=$row['floor_no'];
$noofrooms=$row['no_of_rooms'];
$depthead=$row['dept_head'];

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











if(isset($_REQUEST["insert"]))
{

$data1=getPost();
$deptid=$data1[0];
$floorno=$data1[1];
$noofrooms=$data1[2];
$depthead=$data1[3];
$sql="insert into dept(dept_id,floor_no,no_of_rooms,dept_head)values('$deptid',$floorno,$noofrooms,'$depthead')";
$final=mysqli_query($con,$sql);
if($final)
echo "inserted";
else
echo "not inserted";

}




if(isset($_REQUEST["delete"]))
{

$data2=getPost();
$deptid=$data2[0];
$sql="delete from dept where dept_id='$deptid'";
$final=mysqli_query($con,$sql);
if($final)
echo "deleted";
else
echo "not deleted";


}










if(isset($_REQUEST["update"]))
{

$data3=getPost();
$deptid=$data3[0];
$floorno=$data3[1];
$noofrooms=$data3[2];
$depthead=$data3[3];
$sql="update dept set floor_no=$floorno,no_of_rooms=$noofrooms,dept_head='$depthead' where dept_id='$deptid'";
$final=mysqli_query($con,$sql);
if($final)
echo "updated";


}










?>




<!DOCTYPE html>
<html>
<head>
	<title>My forms</title>
	<link rel="stylesheet" type="text/css" href="form2.css">
</head>

<body background="http://www.hjhigh.com/wp-content/uploads/2016/11/DSC-Classroom.jpg">
	<div class="wrapper">
		<div class="header-area">
			<p>DEPARTMENT ID</p>
			<p>FLOOR NO</p>
			<p>NO OF ROOMS</p>
			<p>DEPT HEAD</p>
			
			</div>
		
		<div class="form-area">
			
			<form action="first.php" method="post">
	<input type="text" name="deptid" value="<?php echo $deptid;?>" autocomplete="off">
    <input type="text" name="floorno" value="<?php echo $floorno;?>" autocomplete="off">
	<input type="text" name="noofrooms" value="<?php echo $noofrooms;?>" autocomplete="off">
	<input type="text" name="depthead" value="<?php echo $depthead;?>" autocomplete="off"><br><br>
			<button value="insert" name="insert">Save</button>

			<button value="delete" name="delete">Delete</button>

			<button value="update" name="update">Modify</button>
            
            <button value="search" name="search">Search</button>
            <br><br>

            <a href="homepage.php" ><button value="back" name="back">Back</a></button>
			
	      </form>
			
		</div>
		

			
			</div>

	



</body>
</html>
