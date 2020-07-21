
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form>
<div class="box">
<h1>Know more</h1>
<form>
	<input type="text" name="deptid" placeholder="Enter dept id" autocomplete="off">

<input type="submit" name="find" value="display">

<a href="third.php"><button id="buttonone">Back</a></button>

</form>
</body>
</html>




<?php

$con=mysqli_connect("localhost","root","","collegeproject","3307");
echo "<br>";

if(isset($_REQUEST["find"]))
{
	$b=$_REQUEST['deptid'];
	$query1="select staff_name from staffroom where dept_id='$b' ";
	$data1=mysqli_query($con,$query1);
	$total=mysqli_num_rows($data1);


	while($result=mysqli_fetch_assoc($data1))
{
 echo "<br>";
 echo $result['staff_name'];
}


if($total!=0)
{
echo "<br>No of faculty in given department is";
echo " $total <br>";

}
else
echo "no record";


}



?>



