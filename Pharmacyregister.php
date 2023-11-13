<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");
include("valid.php");

$a=mysql_real_escape_string($_POST["PHN"]);
$b=mysql_real_escape_string($_POST["PN"]);
$c=mysql_real_escape_string($_POST["PUN"]);
$d=mysql_real_escape_string($_POST["PASS"]);
$e=mysql_real_escape_string($_POST["RTPASS"]);
$f=mysql_real_escape_string($_POST["PSPE"]);
$g=mysql_real_escape_string($_POST["PCN"]);
$h=mysql_real_escape_string($_POST["Address"]);
$fname="";
$fname1="";
$mess="";

if(isset($_FILES['filename']['name']))
{
$fname=time()."_".mysql_real_escape_string($_FILES['filename']['name']);
move_uploaded_file($_FILES['filename']['tmp_name'],"upload/".$fname); 
}
else{
$mess.="Select Image File, ";
}

if(isset($_FILES['filenameL']['name']))
{
$fname1=time()."L_".mysql_real_escape_string($_FILES['filenameL']['name']);
move_uploaded_file($_FILES['filenameL']['tmp_name'],"upload/".$fname1); 
}
else{
$mess.="Select License File, ";
}


$mess.=Fullnamevalid($a,"Please Enter Valid Pharmacist Name, ");
$mess.=nullvalid($b,"Please Enter Valid Pharmacy Name, ");
$mess.=EmailValid($c,"Please Enter Valid Email, ");
$mess.=DatbaseValid("pharmacy_registration","Pharmacy_name",$c,"Email Allready Register, ");


$mess.=nullvalid($d,"Enter Password, ");
$mess.=EqualValid($d,$e,"Password Not Match, ");
$mess.=nullvalid($f,"Enter Speciality, ");
$mess.=phonevalid($g,"Enter Valid Contact No.,",10);
$mess.=nullvalid($h,"Enter Address,");




if($mess=="")
{
	
//echo "insert into hospital_registration (Hospital_head_name,Hospital_name,Hospital_username,Hospital_passwd,Hospital_speciality,Hospital_contact,Hospital_address,Hospital_photo,Apprve,datetm) values('$a','$b','$c','$d','$f','$g','$h','$fname','A','$Rdate')";
	
mysql_query("insert into pharmacy_registration (name,Pharmacy_name,username,passwd,speciality,contact,address,photo,License,Apprve,datetm) values('$a','$b','$c','$d','$f','$g','$h','$fname','$fname1','A','$Rdate')");

echo "<font color=\"#0000FF\">Pharmacy Registration Successfull.</font>";
echo "<script>alert('Pharmacy Registration Successfull'); location.href='".$URLpath."index.php';</script>";
}
else
{
echo '<font color="#FF0000">'.$mess.'</font>';
}
?>
