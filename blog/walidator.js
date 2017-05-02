function setDateAndTime() {
	setDate();
	setTime();
}

function setDate(){
	var d = new Date();
	var fieldDate = document.forms['addPost']['postDate'];
	fieldDate.value = leadingZero(d.getDate())  + '.' + leadingZero(d.getMonth() + 1) + '.' + d.getFullYear();
}
function setTime(){
	var d = new Date();
	var fieldTime = document.forms['addPost']['postTime'];
	fieldTime.value = leadingZero(d.getHours()) + ':' + leadingZero(d.getMinutes()) ;
}

function leadingZero(i) {
	return (i < 10)? '0'+i : i;
}


function validateDate() { 
	var regDate = /^(([0-2][0-9])|(3[0-1]))\.((0[1-9])|(1[0-2]))\.([0-9]{4})$/;
	var postDate = document.forms['addPost'].postDate.value;
	
	if(regDate.test(postDate)){
		var result = regDate.exec(Date);
		var DateDay = result[1];
		var DateMonth = result[4];
		var DateYear = result[7];
		
		alert(DateDay == 2);
		
		if((DateYear%4 == 0 && DateYear%100 != 0) || (DateYear%400 == 0)){
				if ((DateDay > 29) && (DateMonth == 2)) {
					alert('tmp1');
					setDate();
				}
		}else if ((DateMonth == 2) && (DateDay > 28)) {
					alert('tmp1');
					setDate();
		}else if(((DateMonth == 4 || DateMonth == 6 || DateMonth == 9 || DateMonth ==11) != -1) && (DateDay>30)){
					alert('tmp1');
					setDate();			
		} else if(((DateMonth == 1 || DateMonth == 3 || DateMonth == 5 || DateMonth == 7 || DateMonth == 8 || DateMonth == 10 || DateMonth == 12) != -1) && (DateDay > 31)){
					alert('tmp1');
					setDate();			
		}
	}else{
					alert('tmp1');
					setDate();
	}
}

function validateTime() {
	var regTime = /^(([0-1][0-9])|(2[0-3]))\:[0-5][0-9]$/;
	var postTime = document.forms['addPost'].postTime.value;
	
	if(!regTime.test(postTime)){
		alert('tmp2');
		setTime();
	}
}