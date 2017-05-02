function add(){
	var nowy = document.createElement('INPUT');
	nowy.setAttribute('type','file');
	var ktory = document.getElementById('zalaczniki').childElementCount - 1;
	nowy.setAttribute('name','file'+ktory);
	document.getElementById('zalaczniki').appendChild(nowy);
}