function sendIfPossible(){
	if (!(document.getElementById("check").checked)){
		alert('Czat jest nieaktywny'); 
	}else if(!(document.getElementById("nick").value && document.getElementById("message").value)){
		alert('Treść wiadomości lub nick jest nieuzupełnione');
	}else{
		send(); 
	}
}


function update() {
	document.getElementById("chat").innerHTML = "";

	var xmlhttp=new XMLHttpRequest();
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4) {
			if (document.getElementById("check").checked) {
				document.getElementById("chat").innerHTML=xmlhttp.responseText;
			}
			xmlhttp.open("GET", "messages.php", true);
			xmlhttp.send();
		}
	}	
	xmlhttp.open("GET", "messages.php", true);
	xmlhttp.send();
}

function send() {
	var xmlhttp;
	
	xmlhttp=new XMLHttpRequest();

	var nickValue = encodeURIComponent(document.getElementById("nick").value);
	var messageValue = encodeURIComponent(document.getElementById("message").value);

	xmlhttp.open("GET", "send.php?nick="+nickValue+"&message="+messageValue, true); 
	xmlhttp.send();

	document.getElementById("message").value = ""; 
}