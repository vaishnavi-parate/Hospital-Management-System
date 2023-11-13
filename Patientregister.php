<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");
include("valid.php");

$a=mysql_real_escape_string($_POST["PN"]);
$b=mysql_real_escape_string($_POST["PDOB"]);
$c=mysql_real_escape_string($_POST["PG"]);
$d=mysql_real_escape_string($_POST["PCN"]);
$e=mysql_real_escape_string($_POST["Address"]);
$f=mysql_real_escape_string($_POST["PASS"]);
$g=mysql_real_escape_string($_POST["RTPASS"]);
$h=mysql_real_escape_string($_POST["PAN"]);



$fname="";
$mess="";
if(isset($_FILES['filename']['name']))
{
$fname=time()."_".mysql_real_escape_string($_FILES['filename']['name']);
move_uploaded_file($_FILES['filename']['tmp_name'],"upload/".$fname); 
}
else{
$mess.="Select Image File, ";
}


$mess.=Fullnamevalid($a,"Please Enter Valid Patient Name, ");
$mess.=nullvalid($b,"Enter DOB, ");
$mess.=nullvalid($c,"Select Gender, ");
$mess.=phonevalid($d,"Enter Valid Contact No.,",10);
$mess.=nullvalid($e,"Enter Address,");
$mess.=nullvalid($f,"Enter Password, ");
$mess.=EqualValid($f,$g,"Password Not Match, ");
$mess.=nullvalid($h,"Enter Adhar Card No., ");





if($mess=="")
{
	

mysql_query("insert into patient (Patient_name,Patient_dob,Patient_gender,Patient_address,Patient_contact,Patient_pass,photo,AdharNo) values('$a','$b','$c','$e','$d','$f','$fname','$h')");

echo "<font color=\"#0000FF\">Patient Registration Successfull.</font>";
echo "<script>alert('Patient Registration Successfull'); location.href='".$URLpath."index.php';</script>";
}
else
{
echo '<font color="#FF0000">'.$mess.'</font>';
}
?>
