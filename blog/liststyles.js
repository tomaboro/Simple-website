function listStyles(){
	style = document.getElementsByTagName("link");
	var ol = document.createElement('ol');
	ol.setAttribute("class","przyciski")
for(var i=0; i< style.length; i++){
	var li = document.createElement('li');
	var a = document.createElement('a');
	a.setAttribute("onclick","activateStyle('"+style[i].title+"');")
	a.innerHTML = style[i].title;
	li.appendChild(a);
	ol.appendChild(li);
}
document.getElementById('menu').appendChild(ol);

if(findCookie != null){
	activateStyle(findCookie());
}

}

function activateStyle(arg){
	var activated = false;
	style = document.getElementsByTagName("link");
	for(var i=0; i< style.length; i++){
		if(arg == style[i].title){
			activated = true;
			style[i].disabled = false;
			setCookie(style[i].title)
		}
		else{
			style[i].disabled = true;
		}
	}
	if(!activated){
		setCookie(style[0].title);
		style[0].disabled = false;
	}
}

function setCookie(wartosc){   
	var aktualnaData = new Date();     
	aktualnaData.setTime(aktualnaData.getTime() + 30 * 24 * 60 * 60 * 1000);
	czasWygasniecia = aktualnaData.toGMTString();   
	czasWygasniecia = '; expires=' + czasWygasniecia;   
	sciezka = '; path=' + '~/';
	document.cookie = "actStyle" + '=' + encodeURI(wartosc) + czasWygasniecia + sciezka; 
}

function findCookie(){
	var cookie = document.cookie;   
	if(cookie.split("=")[1].length  < 1) { 
		return null; 
	}   
	var start = cookie.indexOf("actStyle" + '=') + "actStyle".length + 1;   
	var koniec = cookie.substring(start, cookie.length);   
	koniec = (koniec.indexOf(';') < 0) ? cookie.length : start + koniec.indexOf(';');   
	return decodeURI(cookie.substring(start, koniec)); 
}