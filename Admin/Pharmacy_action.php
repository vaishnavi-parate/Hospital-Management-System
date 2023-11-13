<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('../db.php');
include("../valid.php");

?>


<div id="flash" class="flash"></div>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="../assets/img/load.gif"></span>');
$.ajax({
type: "POST",
url: "Pharmacy_action.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="../assets/img/load.gif"></span>');

$.ajax({
type: "POST",
url: "Pharmacy_action.php",
data: info,
cache: true,
success: function(html){
	
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="../assets/img/load.gif"></span>');
$.ajax({
type: "POST",
url: "Pharmacy_action.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM pharmacy_registration WHERE PHID='$id'";
mysql_query( $delete);
echo "Delete Successfully";

}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
mysql_query("UPDATE pharmacy_registration SET Apprve = 'YES' WHERE  PHID=".$id."");
echo "Approved Successfully";

}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Pharmacy</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>ID</b></td>
<td><b>Owner Name</b></td>
<td><b>Pharmacy Name</b></td>
<td><b>Email</b></td>
<td><b>Speciality</b></td>
<td><b>Contact</b></td>
<td><b>Address</b></td>
<td><b>Join Date</b></td>
<td></td>
</tr></thead>
<tbody>
<?php

$Cdateval="";

if(isset($_POST["sid"]) and $_POST["sid"]!='')
{
$Cdateval=$_POST["sid"];
}

$dval=$_SESSION['Duserid'];


					$per_page = 10; 
					$select_table = "select * from pharmacy_registration where concat(name,' ',Pharmacy_name,' ',contact) like '%".$Cdateval."%'";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);


if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by PHID DESC limit $start,$per_page";
$fetch= mysql_query($select_table);
}

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row["PHID"]; ?></TD>
<TD><?php echo $row["name"]; ?></TD>
<TD><?php echo $row["Pharmacy_name"]; ?></TD>
<TD><?php echo $row["username"]; ?></TD>
<TD><?php echo $row["speciality"]; ?></TD>
<TD><?php echo $row["contact"]; ?></TD>
<TD><?php echo $row["address"]; ?></TD>
<TD><?php echo $row["datetm"]; ?></TD>
<TD>
<?php
if($row["Apprve"]!="YES")
{
?>
<a href="#" class="Edit" id="<?php echo $row["PHID"]; ?>"><button class="btn btn-sm btn-primary">[ Approve ]</button></a>
<?php
}
?>                                                          
<a href="#" class="ABCD" id="<?php echo $row["PHID"]; ?>"><button class="btn btn-sm btn-danger">
                                                          [ Delete ]</button></a>
														  </TD> 													  </TD> 
</TR>

<?php
}
?>

</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<a href='#'class='pages' id='1'>[|<]</a>&nbsp;";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<a href='#' class='pages' id=".$i.">[".$i."]</a>";
				}
				echo "&nbsp;<a href='#' class='pages' id=".--$i.">[>|]</a>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>

</ul>	
</div>