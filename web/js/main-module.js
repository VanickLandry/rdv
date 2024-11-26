
if ( typeof(myAjaxModalDialog) == "undefined" ) 
{
    var myAjaxModalDialogInfo = new Object();
}


// set ajax link action to display in a modal dialog for all link
function SetAjaxForAllLinkActionMyModalDialog()
{
    // rendre tous les liens en lien ajax
    var regex=new RegExp("ajaxview"); 
    var dom_elements = $("a");

    for( i=0; i<dom_elements.length; i++ ) 
    { 
        if ( regex.test(dom_elements[i].href) && dom_elements[i].id != null && dom_elements[i].id != "") 
        {
            SetAjaxLinkActionMyModalDialog ( dom_elements[i].id , null, null, null, true );
        } 
    }

}


// -- set ajax link action to display in a modal dialog
// @sample_call:  SetAjaxLinkActionMyModalDialog ( 'btn_modal_mng_responsable', null, null, false );
function SetAjaxLinkActionMyModalDialog(link_btn_id, form_id, data2send, target_combobox_id, is_auto)
{
    if (link_btn_id == "" || link_btn_id == null)
    {
        return;
    }

    // store link info
    var link_info = new Object();
    link_info ['link_btn_id'] = link_btn_id;
    link_info ['form_id'] = form_id;
    link_info ['data2send'] = data2send;
    link_info ['target_combobox_id'] = target_combobox_id;
    link_info ['is_auto'] = is_auto;

    // verify
    var existing_link_info = null;
    if (myVarIsset(myAjaxModalDialogInfo [link_btn_id]))
    {
        existing_link_info = myAjaxModalDialogInfo [link_btn_id];
    }

    if (existing_link_info != null && existing_link_info ['is_auto'] == false && is_auto == true)
    {
        return;
    }

    //
    if (existing_link_info == null || 
            (existing_link_info != null && existing_link_info ['is_auto'] == true)
        )
    {
        myAjaxModalDialogInfo [link_btn_id] = link_info;
    }
    

    // set a-link or button action after a clear for all click event
    $("#" + link_btn_id).unbind('click');
    $("#" + link_btn_id).click(function(event) {

        // var my_ajax_remote_url = this.href;

        // build data querystring to send
        var my_ajax_data2send = '';
        var my_ajax_remote_url = '';
        var link_btn_id = this.id;
        var link_info = myAjaxModalDialogInfo [link_btn_id];
         //
        var form_id = link_info ['form_id'];
        var data2send = link_info ['data2send'];
        var target_combobox_id = link_info ['target_combobox_id'];
        
        // alert ( "target_combobox_id:" + target_combobox_id  + '\n' + "link_btn_id:" + link_btn_id  );
        
        //
        $('#btnMyModalDialogOK').hide();

        // #region 20130708_145520 : preciser l'action à la fermeture du modal dialog
        if (target_combobox_id == null)
        {
            $('#btnMyModalDialogOK').hide();
        } else
        {
            // clear onclick event
            // document.getElementById( "btnMyModalDialogOK" ).onclick = null; $('#btnMyModalDialogOK').removeAttr('onclick');
            $('#btnMyModalDialogOK').unbind('click');

            // set on valide click action
            $("#btnMyModalDialogOK").click(function(event) {
                // reset combobox
                $('#' + target_combobox_id + ' option').remove();
                var answer = $("#myModalDialogBody").find("input:checked").val();
                if (! myVarIsset(answer))
                {
                    alert ("no selection found !");
                    return false;
                }
                var arr_values=answer.split( "|" );
                $('#' + target_combobox_id).append('<option value="' + arr_values[0] + '" selected="selected">' + arr_values[1] + '</option>');
                // fermer le dialog
                $('#btnMyModalDialogOK').hide();
                $('#myModalDialog').modal('hide');

                // alert ( "target_combobox_id:" + target_combobox_id  + '\n' + "link_btn_id:" + link_btn_id  );

                return false;
            } );
            // $('#btnMyModalDialogOK').show();
        }
        
        // #endregion 20130708_145520

        //
        if (form_id != null && form_id != "")
        {
            my_ajax_data2send = $("#" + form_id).serialize();
            my_ajax_remote_url = $("#" + form_id).attr('action');
        } else
        {
            my_ajax_remote_url = $("#" + link_btn_id).attr('href');
        }
        //
        if (data2send != null && data2send != "")
        {
            my_ajax_data2send = data2send;
        }
        
        // reset modal dialog content
        $('#myModalDialogBody').html( '');
        $('#myModalDialog').modal('show');
        // $('#myModalDialogBody').html( $('#myModalDialogAjaxLoadInfo').html() );
        $('#myModalDialogBody').hide();
        $('#myModalDialogAjaxLoadInfo').show();
        // adjust Modal Width with css properties
        $('#myModalDialog').css({ 
                width: 'auto',
                'margin-left': function () {
                    return -($(this).width() / 2);
                }
            });


        $.post( 
                my_ajax_remote_url,
                my_ajax_data2send, // $("#testform").serialize(), // 'name=achille&age=12&sex=Male',
                 function(data) {
                    $('#myModalDialogBody').hide();
                    $('#myModalDialogAjaxLoadInfo').show();
                    // load remote uri / url page
                    $('#myModalDialogBody').html(data);
                    
                    // afficher le resultat
                    $('#myModalDialogBody').show();
                    $('#myModalDialogAjaxLoadInfo').hide();

                    // adjust Modal Width with css properties
                    $('#myModalDialog').css({ 
                            width: 'auto',
                            'margin-left': function () {
                                return -($(this).width() / 2);
                            }
                        });
                 } // endfunction(data)
        ); // end$.post

        return false;
    }); // end.click
}


// initialize date combo box cssClass
function InitializeDateDropdownCssClass()
{
    // personnaliser la css class pour listes deroulantes pour date(jour,mois,annee)
    var regex=new RegExp("_date_"); var dom_element = $("select");
    for( i=0; i<dom_element.length; i++ ) { if ( regex.test(dom_element[i].id) ) { dom_element[i].setAttribute("class", "span1"); } } // "rta_size_01"
}

// initialize main modal dialog
function InitializeMyModalDialog()
{
    // initialize modal dialog
    $('#myModalDialog').modal({
        keyboard: false
        , backdrop: false
        , show: false 
        // , remote: 'http://localhost:2001/realtime_assets/web/empty.htm'
    }) // Adjust Modal Width with css properties
    .css({ 
            width: 'auto',
            'margin-left': function () {
                return -($(this).width() / 2);
            }
        }) 
}

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


function myVarIsset(tvar)
{
    if ( typeof(tvar) == "undefined" ) 
    {
        return false;
    } else {
        return true;
    }
} 

function myVarIsset2(tVar)
{
    try
    {
        var tmp = eval(tVar);
    }
    catch (e)
    {
        return false;
    }
    return true;
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
 
 	