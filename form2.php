<?php
$deptid="";
$floorno="";
$noofrooms="";
$depthead="";

$con=mysqli_connect("localhost","root","","college","3307");
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

$data1=getPost();
$deptid=$data1[0];
$sql="delete from dept where dept_id='$deptid'";
$final=mysqli_query($con,$sql);
if($final)
echo "deleted";
else
echo "not deleted";


}

if(isset($_REQUEST['search']))
{

$data1=getPost();
$sql3="select * from dept where dept_id='$data1[0]'";
$result=mysqli_query($con,$sql3);

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




?>




<!DOCTYPE html>
<html>
<head>
	<title>My forms</title>
	<link rel="stylesheet" type="text/css" href="form2.css">
</head>
<body>
	<div class="wrapper">
		<div class="header-area">
			<p>DEPARTMENT ID</p>
			<p>FLOOR NO</p>
			<p>NO OF ROOMS</p>
			<p>DEPT HEAD</p>
			
			</div>
		
		<div class="form-area">
			<form>
			<input type="text" name="deptid" value="">
		    <input type="text" name="floorno" value="">
			<input type="text" name="noofrooms" value="">
			<input type="text" name="depthead" value=""><br><br><br>
		    <button value="insert" name="insert">INSERT</button>
			<button value="delete" name="delete">DELETE</button>
			<button value="update" name="update">UPDATE</button>
			<button value="search" name="search">SEARCH</button>
		</form>

			
			</div>

		</div>



</body>
</html>