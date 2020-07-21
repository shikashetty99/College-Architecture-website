
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
	<input type="text" name="floorno" placeholder="Enter floor no" autocomplete="off">

<input type="submit" name="find" value="display">
<a href="second.php"><button id="buttonone">Back</a></button>
</form>
</body>
</html>




<?php


$con=mysqli_connect("localhost","root","","collegeproject","3307");


if(isset($_REQUEST["find"]))
{

$a=$_REQUEST['floorno'];
$query="select lab_no from deptlabs where floor_no=$a";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);




while($result=mysqli_fetch_assoc($data))
{
 echo "<br>";
echo $result['lab_no'];
}
if($total!=0)
{
echo "<br>No of rooms in the given floor:";
echo " $total <br>";

}
else
echo "no record";

}

?>
