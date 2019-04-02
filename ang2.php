<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

extract($_POST); 
extract($_GET); 

$conn=mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($conn,'exam_portal');

$result = $conn->query("SELECT * FROM questions");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"question":"'  . $rs["question"] . '",';
    $outp .= '"q_id":"'   . $rs["q_id"]        . '",';
    $outp .= '"opt1":"'   . $rs["opt1"]        . '",';
    $outp .= '"opt2":"'   . $rs["opt2"]        . '",';
    $outp .= '"opt3":"'   . $rs["opt3"]        . '",';
    $outp .= '"opt4":"'. $rs["opt4"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();
echo($outp);
?>