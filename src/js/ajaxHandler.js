/**
 * By Samar Dhwoj Acharya
 * samar@techgaun.com
 */

function ajaxHandler(file, id)
{
    ajaxGateway(file, id);
}

function ajaxGateway(file, id)
{
    var xmlhttp;
    var isGet = 1;
    var postData;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject(Microsoft.XMLHTTP);
    }
    
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	
            if (id == "question")
            {
            	str = xmlhttp.responseText;
            	if (str.substring(0, 9) == ":success:")
            	{
            		str = str.substring(9);
            		clearInterval(process);
            		document.getElementById(id).innerHTML = str;
            		startTimer();
            	}
            	else
            	{
            		
            	}
                return false;                
            }
            
            
            else if (id == "txtAnswer")
            {
                if (xmlhttp.responseText == "1")
                {
                	alert("Your answer has been submitted. Please wait for the declaration of winner.");
                	window.location = "finished.php";
                	return false;
                }
                else
                {
                	/*document.getElementById('lblUname').style.display = "inline";
            		document.getElementById('lblUname').style.color = "#0f0";
                	document.getElementById('lblUname').innerHTML = "Username is available";*/
                }
            }
            
            else if (id == "current_question")
            {
            	alert(xmlhttp.responseText);
            	//document.getElementById('lblCurrent').innerHTML = "";
            }
            
            else if (id == "answers")
            {
            	document.getElementById('current_question').innerHTML = xmlhttp.responseText;
            	//document.getElementById('lblCurrent').innerHTML = "";
            }
        }
    }
    if (id == "question")
    {
        isGet = 1;
    }
    
    if (id == "txtAnswer")
    {
        isGet = 1;
    }
    
    if (isGet == 0)
    {
        xmlhttp.open("POST", "./pages/"+file, true);        
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(postData);
    }
    else
    {
        xmlhttp.open("GET", "./pages/"+file, true);
        xmlhttp.send();
    }
}