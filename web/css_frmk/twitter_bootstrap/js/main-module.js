
// -- obtenir la reference d'un element
function rt(strElementId)
{
	return document.getElementById(strElementId);
}

// passer de l'utf8 à ascii iso europe
function Get_utf8_to_iso ( svalue ) 
{
	svalue = svalue.replace("&amp;", "&"); // .replace(regexp, “exist”);
	return svalue;
}

// acceder à une variable globale javascript
function GetJsStringValue ( sJsVariableName ) 
{
	//
	return Get_utf8_to_iso ( eval(sJsVariableName + "") );

	//return "&&";
	// var s_return = "";
	 // s_return = eval("flashvars.page_title");
	 // s_return = eval(sJsVariableName + "");
	//
	// return s_return;
}

// #region compatibilité pour getElementsByTagName concernant IE
function ie_getElementsByTagName(str)
 {
	if (str=="*") 	
	{
		return document.all;
	}
	// -- 
	return document.all.tags(str);	
}

 if (document.all)  document.getElementsByTagName = ie_getElementsByTagName;
 
 // #endregion compatibilité pour getElementsByTagName concernant IE
 
 // #region compatibilité pour event.keyCode

function cancel_Key(e)
{
	if (!e) var e = window.event;  //for IE
	
	var code;
	if(e.keyCode) code = e.keyCode; //for IE
	if(e.which) code = e.which;  //for other browsers
	alert(code);  //this will identify the code of the key you press
	if (code == "<the code you are interested in responding to>") return false;
	else return true;
}


// <div id="desc"> hide / display an html element </div>
// <div id="sample1"> <div class="aid4w_lnk08" ><a href="javascript:switchVisibility('faq1')"> Quel est le numero </a> </div> </div>
// <div id="sample2"> <div class="aid4w_lnk08" onclick="switchVisibility('faq3')"> Qui puis-je </div> </div>
function switchVisibility(s_element_id)
{
	obj = document.getElementById(s_element_id);
	if (obj.style.display != 'none')
	{
		obj.style.display = 'none';
	} 
	else
	{
		obj.style.display = '';
	}
	//
	return 1;
}


/*
window.onload=function()
{
	document.onkeypress = cancel_Key;
};
window.onload=function()
{
	document.my_form.onkeypress = cancel_Key;
};
*/
 // #endregion compatibilité pour event.keyCode
 
 	