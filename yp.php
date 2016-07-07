<!DOCTYPE html> <html>
	<head>
		<title> Yellow Pages Api Search Listing </title>
	</head>
<style>
.fff{ background: none repeat scroll 0 0;height: 41%;left: 0;margin: 180px 0 0 153px;position: fixed;top: 0;width:76%;z-index: 9999999;}
.button{background:#2D6AB4;border-radius: 5px;color:#fff;line-height:25px;margin:0 1em 0 0;padding:0 7px;font-family:arial; border:0}
.inner{width:650px;text-align:center;padding:2px 0px;background:#2D6AB4;font-family:arial;font-size:12px;color:#ffffff;font-weight:bold;vertical-align:middle;height: 20px;padding-top: 5px;}
.outer{margin-left:250px;width:650px;;padding:0;border:1px solid #2D6AB4;background:#f0f0f0;}
</style>
<body>
<div class="outer">
<div class="inner">Search Products </div>
<div  style="width:100%;margin:10px auto;float:left;margin-left:18px">
<form id="update_w" name="myForm" >
<span style="color:#2D6AB4; float:left; margin-top:5px">What?</span>
<input type="text" name="cat" id="cat" tabindex="2" value="" placeholder="What You are looking for?" style="margin:0 15px;width:185px; float:left; border:1px solid #e3e3e3; padding:5px; border-radius:4px"/>
<label style="color:#2D6AB4; float:left;  margin-top:5px">Where?</label>
<input type="text" name="city" id="city" tabindex="2" value="" placeholder="What You are looking for?" style="margin:0 15px;width:185px; float:left; border:1px solid #e3e3e3; padding:5px;border-radius:4px"/>
<input type="hidden" name="country" id="country" tabindex="1"  value="US" placeholder="Country" style="margin:0;width:185px; float:left" />
<input type="button" name="update" value="Search" onClick="get_category();" class="button" />

</form>
</div>
</div>
<!--<div id="spinner" class="fff"></div>-->
	<div id="result" style="background-color:#FFFFFF;width:77%;height:50%;margin:20px auto;" >
</div>
 </body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
function  get_category() { 
var x = document.forms["myForm"]["cat"].value;
    if (x == null || x == "") {
        alert("Please Enter the Category ");
        return false;
    }
	var x = document.forms["myForm"]["country"].value;
    if (x == null || x == "") {
        alert("Please Enter the Country ");
        return false;
    }
	var x = document.forms["myForm"]["city"].value;
    if (x == null || x == "") {
        alert("Please Enter the city ");
        return false;
    }
	
	var frm_data=$("#update_w").serialize();
		$.ajax({
		url: 'process_yp.php',
		type: 'POST', 
		data: frm_data,
		success: function(output) { 
		if(output){ 
			$('#result').html(output);
			}
		 }
		});
}
</script>