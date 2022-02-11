function validate(){

var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";
var checkForSpecialChar = function(string){
 for(i = 0; i < specialChars.length;i++){
   if(string.indexOf(specialChars[i]) > -1){
       return true
    }
 }
 return false;
}

var status=true;  

var kannumer = /\d/;
var username=document.form.username.value;
var num=document.form.phone.value;
var emri=document.form.emri.value;
var mbiemri=document.form.mbiemri.value;
var address=document.form.address.value;
	if (checkForSpecialChar(username)){
		  document.getElementById("usernamev").innerHTML="Karaktere të ndaluara!";
		  status = false;
	}
	if (isNaN(num) || checkForSpecialChar(num)){
		  document.getElementById("numloc").innerHTML="Enter Numeric value only";
		  status = false;
	}else {document.getElementById("numloc").innerHTML="";}
	if (kannumer.test(emri) || checkForSpecialChar(emri)){
		  document.getElementById("emriv").innerHTML="Shenoni një emer valid!";
		  status = false;
	}else {document.getElementById("emriv").innerHTML="";}
	if (kannumer.test(mbiemri) || checkForSpecialChar(mbiemri)){
		  document.getElementById("mbiemriv").innerHTML="Shenoni një mbiemer valid!";
		  status = false;
	}else {document.getElementById("mbiemriv").innerHTML="";}
	if (checkForSpecialChar(address)){
		  document.getElementById("addressv").innerHTML="Karaktere të ndaluara!";
		  status = false;
	}else {document.getElementById("addressv").innerHTML="";}
return status;
}
