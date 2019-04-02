<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$con=mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,'exam_portal');


$json_array= array();
$n=range(1,3);
shuffle($n);
for ($i=0; $i<3 ; $i++) { 
	//$sql="SELECT * FROM questions WHERE q_id='$n[$i]'";
    //$result=mysqli_query($con,$sql);


    $result=$con->query("SELECT * FROM questions WHERE q_id='$n[$i]'");

	while($rs = mysqli_fetch_assoc($result)) {
    	$json_array[]=$rs;
}
}
#$outp ='{"records":'+$json_array+'}';
$outp= json_encode($json_array);
echo '{"records":'.$outp.'}';
$con->close();

#echo($outp);
?>