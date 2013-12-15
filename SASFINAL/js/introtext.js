var AJAXtext = new XMLHttpRequest();
var url = "http://localhost/SASFINAL/AJAX/introtext.php";



AJAXtext.onreadystatechange=function()
{
    if(AJAXtext.readyState==4 && AJAXtext.status==200)
    {
    document.getElementById("introdummy").innerHTML=AJAXtext.responseText;
    }
};
AJAXtext.open('GET', url, true);
AJAXtext.send();