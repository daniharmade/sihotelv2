// JavaScript Document
var ajaxku;
function get_tarif(tar){
        ajaxku = createajax();
        var url="get_tarif.php";
        url=url+"?tar="+tar;
        url=url+"&sid="+Math.random();
        ajaxku.onreadystatechange=tarifChanged;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }
function tarifChanged(){
        var data;
        document.getElementById("dvtarif").innerHTML= "Looading.......";
        if (ajaxku.readyState==4)
            {
                data=ajaxku.responseText;
                if(data.length>0)
                    {
                        document.getElementById("dvtarif").innerHTML = data
                    }
                else
                    {
                        document.getElementById("dvtarif").innerHTML= "";
                    }
            }
        else
            {
                document.getElementById("dvtarif").innerHTML= "Looding";
            }           
        }                                           
  
function createajax(){
        if (window.XMLHttpRequest){
                return new XMLHttpRequest();
            }
        if (window.ActiveXObject){
            return new ActiveXObject("Microsoft.XMLHTTP");
            }
        return null;
    }