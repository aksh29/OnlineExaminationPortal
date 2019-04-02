


<?php


$conn=mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($conn,'student');


$json_array="";
$n=range(1, 9);
shuffle($n);

$arr = array();
for ($i=0; $i <7 ; $i++) { 
    $arr[$i]=$n[$i];
}
session_start();
$_SESSION['array']=$arr;

for ($i=1; $i <7 ; $i++) { 
    $sql="SELECT * FROM questions WHERE ID='$n[$i]'";
    $result=mysqli_query($conn,$sql);

    while($rs = mysqli_fetch_assoc($result)) {
        $json_array.='{"Qno":'.'"'.$i.'",'.'"Question":'.'"'.$rs['Question'].'",';
        $json_array.='"OptionA":'.'"'.$rs['OptionA'].'",';
        $json_array.='"OptionB":'.'"'.$rs['OptionB'].'",';
        $json_array.='"OptionC":'.'"'.$rs['OptionC'].'",';
        $json_array.='"OptionD":'.'"'.$rs['OptionD'].'",';
        $json_array.='"CorrectOption":'.'"'.$rs['CorrectOption'].'",';
        if ($i==6) {
            $json_array.='"ID":'.'"'.$rs['ID'].'"}';
        }
        else{
        $json_array.='"ID":'.'"'.$rs['ID'].'"},';
         }




}
}

#$outp ='{"records":'+$json_array+'}';


echo '{"records":['.$json_array.']}';
$conn->close();

#echo($outp);
?>