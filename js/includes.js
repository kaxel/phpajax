function runScript(str) {
	
	$('#resultMessage')[0].innerHTML='running...';
	$('#columns').hide();
	
	if (str=="0") {
		$('#resultMessage')[0].innerHTML="";
		return;
	} 
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			$('#resultMessage')[0].innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",str,true);
	xmlhttp.send();
}

function loadData(str) {
	$('#resultMessage')[0].innerHTML='running...';
	
	var resultmessage = "running...";
	
	if (str=="0") {
		$('#resultMessage')[0].innerHTML="";
		return;
	} 
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		$('#resultMessage')[0].innerHTML=resultmessage;
		
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      	// this is where we bind the JSON to a jquery table
			var json = xmlhttp.responseText;
      	
      		obj = $.parseJSON(json);
      	    $('#columns').columns({
      			data:obj,
      			sortableFields: ['name','amt'],
      			sortBy: 'name'
      		});
        	resultmessage = "Done.";
			$('#resultMessage')[0].innerHTML=resultmessage;
			$('#columns').show();	
		} else {
			resultmessage = "That didn't work. Perhaps the database is not yet populated?";
			$('#columns').hide();
		}
	}
	
	xmlhttp.open("GET",str,true);
	xmlhttp.send();
	
}