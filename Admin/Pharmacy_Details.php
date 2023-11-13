

                       <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header bootstrap-admin-content-title">
                                <h1>Pharmacy </h1>
                            </div>
                        </div>
                    </div>


<script type="text/javascript" src="../assets/js/jquery.min.js"></script>


<link rel="stylesheet" href="../assets/humanity/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="../assets/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.ui.datepicker.min.js"></script>
<style type="text/css">
.ui-datepicker
{
   font-family: Arial;
   font-size: 13px;
   z-index: 1003 !important;
   display: none;
}
</style>


<div class="col-md-12 margin-bottom-15"><form id="Dateval">
<label for="firstName" class="control-label">Search Pharmacy</label>
<input type="text" id="jQueryDatePicker1" name="sid" class="form-control" Placeholder="Key">
<br>
<input type="button" onClick="autosearch(1);"  class="btn-info btn-lg " Value="Search"><br>
<br></form> 
</div>


<script type="text/javascript">
function autosearch(str)
{
var textcontent2 = 1;
var textcontent1 = $("#jQueryDatePicker1").val();
var info = $('#Dateval').serialize()+'&page=1';
if(info=='')
{
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
}
</script>




<script type="text/javascript">
	$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="../assets/img/load.gif"></span>');
$.ajax({
type: "POST",
url: "Pharmacy_action.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
return false;
});

</script>

<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>

