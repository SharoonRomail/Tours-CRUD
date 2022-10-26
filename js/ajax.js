////////////////// AJAX request intialization //////////////////
function ajaxRequest(){
	// ajax request intialization with respect to browser
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest()
	}else{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return xmlhttp
}
////////////////// AJAX request intialization //////////////////

////////////////// Delete Tour //////////////////
function ajax_delete(id,field){
	var deleteit = confirm("Are you sure you want to delete?");
	if (deleteit == true){
		var xmlhttp = new ajaxRequest();
		//make string of all the elements according to following patteren
		var parameters = "id="+id+"&field="+field;
		//alert (parameters);
		//do any form validations if requrid then proced further
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 || xmlhttp.readyState=="complete"){
				if(xmlhttp.status == 200){
					//if response yes then printing in the browser
					var content = xmlhttp.responseText;
					console.log (content);
					if (content == 'Error1'){
						alert ('Error1');
					}else if (content == 'Error2'){
						alert ('Error2');
					}else{
						console.log ( "Field : " + content);
						if (content == 'tour'){
							Goto('tours.php');
						}else if (content == 'tour_type'){
							Goto ( 'tour_type.php' );
						}else if (content == 'users'){
							Goto ( 'users.php' );
						}
					}
				}else{
					alert("Error reading data");
				}
			}
		}
		xmlhttp.open("POST", "common/ajax_php.php?todo=AJAX_Delete", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//xmlhttp.setRequestHeader("Content-length", parameters.length);
		//xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(parameters);
	}
}
////////////////// Delete Tour //////////////////