<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>The Golf Pilot</title>
<link href="golf-website.css" rel="stylesheet" type="text/css" />
<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
<script type="text/javascript">
function callWebService(url, callback)
{
    var xmlDoc = null;
  
    if (window.XMLHttpRequest)
    {
        xmlDoc = new XMLHttpRequest(); //Newer browsers
      
    }
    else if (window.ActiveXObject) //IE 5, 6
    {
        xmlDoc = new ActiveXObject("Microsoft.XMLHTTP");
    }
 
    if (xmlDoc)
    {
        //callback for readystate
        xmlDoc.onreadystatechange = function() { stateChange(xmlDoc, callback); };
            xmlDoc.open("GET", url, true); //set for async "get"
        xmlDoc.send(null); //execute asynchronous call to web service
    }
    else
    {       alert("in callback" );
             if(callback)   
            callback(false, "unable to create XMLHttpRequest object");
    }
}
 
// Updates readystate by callback
function stateChange(xmlDoc, callback)
{alert("in stateChange" );
    if (xmlDoc.readyState == 4)
    {
        var text = "";
 
        if (xmlDoc.status == 200)
        {
            //select node containing data
            var nd = xmlDoc.responseXML.documentElement.getElementsByTagName("coordinates");
            alert("value of the geocode is---->"+nd);
            if (nd && nd.length == 1) //IE use .text, others .textContent
                text = !nd[0].text ? nd[0].textContent : nd[0].text;
                alert("value of the geocode is---->"+text);
                 }
 
        // Perform callback with data if callback function signature was provided,
        // alternately we could perform UI update right here vs a callback.
        if(callback != null)
            callback(text != "", text);
          
        }
 
        // Perform callback with data if callback function signature was provided,
        // alternately we could perform UI update right here vs a callback.
        if(callback != null)
            callback(text != "", text);
}
 
 
// Callback pointer supplied to callWebService function to
// display results of web service call
function callbackTest(result, data)
{
    if (result)
      {
	  var geopoint=data;
	  alert(geopoint);
      } 
	else
        alert("Web service call failed " + data);
   
}
function sevriceHandler(url,callbackTest){

var startFrom=document.getElementById('txtStartFrom').value;
var speed=document.getElementById('txtSpeed').value;
callWebService('http://maps.google.com/maps/geo?key=yourkeyhere&output=xml&q='+startFrom,callbackTest);

}
</script>
</head>

<body>

<div class="gap"></div>
<div id="header">
<div id="quick-bg">



<?php include_once("custommap.php");?>
<form name="frmhome" id="frmHome">
<!--<table height="10" bgcolor="#EEFFFF" width="1100">
<tr>
 <td nowrap >Plan your next golf tip below.Just tell us where you'll start and how far You can go. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </td>
 
 <td>
 <input type='text' name='txtStartFrom' id='txtStartFrom' value="Starting Point" maxlength="50" /></td>&nbsp;&nbsp;&nbsp;&nbsp;
 <td> <input type='text' name='txtSpeed' id='txtSpeed' value="Air Speed" maxlength="50" /></td>
<td><input type="button" value="test the service" Id="drawingName"  name="drawingName" tabindex="1" onclick="sevriceHandler('http://maps.google.com/maps/geo?key=yourkeyhere&output=xml&q=mumbai',callbackTest);" maxlength="100" size="70"></td>

</tr>
<tr>
<td nowrap>(To skip this step in future simply register with us and we will keep this infromation for you)</td>
</tr>
</table>-->

<div>
<table>
<tr><td><iframe src="add.php" width="500" height="300"></iframe></td>
<td><iframe src="Feature.php" width="300" height="300"></iframe></td>
<td><?php include_once("login.php");?></td>

   </tr>
</table>
</div>
<table>
<tr>
<td>

</td>
<td>

</td>
</tr>
</div>
</table>
</div>
</form>


</body>
</html>
