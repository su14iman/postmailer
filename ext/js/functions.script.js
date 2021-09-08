function test(){
	alert('test functions ');
}



function HideAllPage(){
	$('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#pageAds').hide();
	return true;
}


function ButtuonPrviewType(typeID){
	// alert(typeID)
	HideAllPage();
	if(typeID == 1){
		$('#page6').show();
	}else if(typeID == 2){
		$('#page1').show();
		Page1_LoadAllName();
	}else if(typeID == 3){
		$('#page2').show();
		Page2_LoadColor();
	}else if(typeID == 4){
		$('#page3').show();
		Page3_loadAllData();
	}else if(typeID == 5){
		$('#page5').show();
		Page5_loadAllLog();
	}else if(typeID == 6){
		$('#page4').show();
		Page4_loadData();
	}else{
		$('#pageAds').show();
	}
}







// Page 6 .. 

function Page6_UpdateEmail(){
	var txt = $('#page6_subject').val();
	var htmlCode = CKEDITOR.instances['htmlCodeCK'].getData();
	
	// EmailSubject , EmailHTML
	// EditContaentEmail . s = ok
	$.post("io",{EmailSubject:txt,EmailHTML:htmlCode},function(c){ 
		$.each(c.EditContaentEmail, function (i, va) {
					var status = va.s;
					if(status == 'ok'){
						alert(':)) ');
					}else{
						alert('error');
					}
		}); // End each .. 
	},'json');

}





function ButtuonStepOnePage6(){
	Page6_UpdateEmail();
	HideAllPage();
	$('#page7').show();
	$('#ajaxTest').load("preview");


}




// Page 1 .. 

function Page1_AddViewHtml(){
	// #EmplyeeCreate -- 0\1
	// hidedive
	var status = $('#EmplyeeCreate').attr('hidedive');
	if(status == 1){
		$('#EmplyeeCreate').attr('hidedive',0);
	}else{
		$('#EmplyeeCreate').attr('hidedive',1);
	}
	return false; 
}




function Page1_AddNewName(){
	var EmplyeeCreateName = $('#EmplyeeCreateName').val();
	var EmplyeeCreateEmail = $('#EmplyeeCreateEmail').val();
		if(EmplyeeCreateName !== '' && EmplyeeCreateEmail !=='' ){
			$.post("io",{maillistaddnewname:EmplyeeCreateName,maillistaddnewemail:EmplyeeCreateEmail},function(c){ 
				Page1_LoadAllName();
			},'json');			
		}else{
			alert('error2');
		}
	return false;
}




function Page1_LoadAllName(){
		$('.EmplyeeTR').remove();
	$.post("io",{maillistloadall:'load'},function(c){ 
		$.each(c.GetAllMyMailList, function (i, va) {
					var id = va.id;
					var fullname = va.FullName;
					var email = va.email;
					var num = ++i;
					var htmll = '<tr class="EmplyeeTR" rowtr="'+id+'" style="color: #404041;"> <td>'+num+'</td> <td>'+fullname+'</td> <td>'+email+'</td> <td class="DeleteTR"></td> </tr>';
					$('#StarTableHere').before(htmll);
					// alert(id);
					
		}); // End each .. 


	$('.EmplyeeTR').hover(function(){
				var rowtr = $(this).attr('rowtr');
				$('[rowtr='+rowtr+'] .DeleteTR').empty();
				var i ='<i style="cursor: pointer;" class="fa fa-times" onclick="Page1_RemoveAllName('+rowtr+')" aria-hidden="true"></i>';
				$('[rowtr='+rowtr+'] .DeleteTR').append(i);
			},function(){
				$('.DeleteTR').empty();
			});
	},'json');

	return false;
}




function Page1_RemoveAllName(id){
	$.post("io",{maillistremoveid:id},function(c){ 
		$.each(c.RemoveEmailToMailList, function (i, va) {
			   var status = va.s
			  
		}); // End each ..
			$('[rowtr='+id+']').remove(); 
	},"json");
	 return false;
}






// page3 

function Page3_loadAllData(){
$.post("io",{contatcusloaddata:1},function(c){ 
		$.each(c.ShowUserContact, function (i, va) {
			   var numberPhome = va.numberPhome
			   var addresss = va.addresss
			   var facebook = va.facebook
			   var twitter = va.twitter
			   var instagram = va.instagram
			   var email = va.email
			 $('#Page3NumberPhone').val(numberPhome);
			 $('#Page3Email').val(email);
			 $('#Page3Address').val(addresss);
			 $('#Page3Facebook').val(facebook);
			 $('#Page3Instagram').val(instagram);
			 $('#Page3Twitter').val(twitter);  
			  
		}); // End each ..
	},"json");
}

function Page3_UpdateData(){
// alert('ok')
			 var np = $('#Page3NumberPhone').val();
			 var em = $('#Page3Email').val();
			 var ad = $('#Page3Address').val();
			 var fa = $('#Page3Facebook').val();
			 var insta = $('#Page3Instagram').val();
			 var twi = $('#Page3Twitter').val();


var data = {ContatctUsEnumberphone:np,
			ContatctUsEemail:em,
			ContatctUsEaddress:ad,
			ContatctUsEfacebook:fa,
			ContatctUsEtwitter:twi,
			ContatctUsEinsta:insta}

	$.post("io",data,function(c){ 
		$.each(c.EditUserContact, function (i, va) { 
			  alert(va);
		}); // End each ..
	},"json");

// EditUserContact ->s = ok
return false;
}









// page2 


function Page2_UpdateColor(){
	var Colorbody = $('#Page2Colorbody').val().replace('#', '');
	var Colorheader = $('#Page2Colorheader').val().replace('#', '');
	var Colorfooter = $('#Page2Colorfooter').val().replace('#', '');
	var Colorbodyemail = $('#Page2Colorbodyemail').val().replace('#', '');

	var data = {TemDesignColorbody:Colorbody,
			TemDesignColorheader:Colorheader,
			TemDesignColorfooter:Colorfooter,
			TemDesignColorbodyemail:Colorbodyemail}


	$.post("io",data,function(c){ 
		$.each(c.EditColorTemplateDesign, function (i, va) { 
			  alert(va);
		}); // End each ..
	},"json");

}


function Page2_LoadColor(){
$.post("io",{TemDesignShowColor:1},function(c){ 
		$.each(c.showTemplateDesign, function (i, va) { 
			  // alert(va);
			  var logoPosition = va.logoPosition
			  var ColorHeader = va.ColorHeader
			  var ColorFooter = va.ColorFooter
			  var ColorBodyBox = va.ColorBodyBox
			  var ColorBodyPage = va.ColorBodyPage

	var Colorbody = $('#Page2Colorbody').val('#'+ColorBodyPage);
	var Colorheader = $('#Page2Colorheader').val('#'+ColorHeader);
	var Colorfooter = $('#Page2Colorfooter').val('#'+ColorFooter);
	var Colorbodyemail = $('#Page2Colorbodyemail').val('#'+ColorBodyBox);


		}); // End each ..
	},"json");

}


function Page2_UpdatePostionLogo(){
	var vv = $('#Page2LogoPostion').val();
	$.post("io",{TemDesignLogoPostionE:vv},function(c){ 
		$.each(c.PostionLogoTemplateDesign, function (i, va) { 
			  alert(va);
		}); // End each ..
	},"json");

}


function Page2_UpdateLogo(){
	var url = $('#page2logoURL').val();
	$.post("io",{TemDesignLogoE:url},function(c){ 
		$.each(c.AddLogoTemplateDesign, function (i, va) { 
			  alert(va);
		}); // End each ..
	},"json");
}







// page5 ..

function Page5_loadAllLog(){
	$('#page5Alllog').attr('hidedive',0);
	$('#page5IDlog').attr('hidedive',1);
	$('#page5AllLogView').empty();

	$.post("io",{MailLogLoadAll:1},function(c){ 
		$.each(c.ListMyLogs, function (i, va) { 
			 var id = va.id;
			 var timeCreate = va.timeCreate;
			 // page5AllLogView
			 var htmlRes = '<li><a href="#" onclick="Page5_printlogID('+id+')">'+timeCreate+'</a></li>';
			 	$('#page5AllLogView').append(htmlRes);

		}); // End each ..
	},"json");


// MailLogLoadAll
// ListMyLogs -> id , timeCreate

}



function Page5_printlogID(id){
	$('#page5IdLogView').empty();
	$('#page5Alllog').attr('hidedive',1);
	$('#page5IDlog').attr('hidedive',0);
	// page5IdLogView
	$.post("io",{MailLogLoadID:id},function(c){ 
		// $.each(c.ReadOnLogfile, function (i, va) { 
			 var status = c.ReadOnLogfile.s;
			 var lines = c.ReadOnLogfile.Lines;
			 // console.log(lines);

		 $.each(c.ReadOnLogfile.Lines, function (i, va) { 
		 	// alert(va);
		 	$('#page5IdLogView').append(va+'<br>');
			}); // End each ..
	},"json");

}













// page4 .. 

function Page4_loadData(){
	
	$.post("io",{SettingsLoadAllMyData:1},function(c){ 


		var c1decodeArray = $.parseJSON(c[1]);
			var DayLimetd = c1decodeArray.sumTimeLimtedForAccountDays.day
			
		var c0decodeArray = $.parseJSON(c[0]);
			var FullName = c0decodeArray.GetClientInfo[0].fullname;
			var Email = c0decodeArray.GetClientInfo[0].email;
			var EmailSend = c0decodeArray.GetClientInfo[0].EmailSend;
			$('#Page4viewName').text(FullName);
			$('#Page4viewEmail').text(Email);
			$('#Page4viewEmailSend').text(EmailSend);
			$('#Page4viewDaysLimetd').text(DayLimetd);
	},"json");

}





function Page4_UpdateName(){
	// page4inputName
	var varbilPross = $('#page4inputName').val();
		if(varbilPross !== ''){
			// $('#page4inputName').css('border':'1px solid green');

		}else{
			$('#page4inputName').css({'border':'1px solid red'});
			alert('error null');
		}
}




function Page4_UpdateEmail(){
	// page4inputEmail
	var varbilPross = $('#page4inputEmail').val();
		if(varbilPross !== ''){
			// $('#page4inputEmail').css('border':'1px solid green');

		}else{
			$('#page4inputEmail').css({'border':'1px solid red'});
			alert('error null');
		}
}



function Page4_UpdateEmailSend(){
	// page4inputEmailSend
	var varbilPross = $('#page4inputEmailSend').val();
		if(varbilPross !== ''){
			// $('#page4inputEmailSend').css('border':'1px solid green');

		}else{
			$('#page4inputEmailSend').css({'border':'1px solid red'});
			alert('error null');
		}
}


function Page4_UpdatePassword(){
	var CurrutPassword = $('#page4inputPasCurrut').val();
	var NewPassword = $('#page4inputPasNew').val();
	var ReNewPassword = $('#page4inputPasReNew').val();

		if(CurrutPassword !=='' && NewPassword !=='' && ReNewPassword !==''){
			// alert('ok');
			$('#page4inputPasCurrut').css({'border':'0px'});
			$('#page4inputPasNew').css({'border':'0px'});
			$('#page4inputPasReNew').css({'border':'0px'});
			if(NewPassword == ReNewPassword){

				$('#page4inputPasNew').css({'border':'1px solid green'});
				$('#page4inputPasReNew').css({'border':'1px solid green'});
				alert('ok :) ');
			}else{
				$('#page4inputPasNew').css({'border':'1px solid red'});
				$('#page4inputPasReNew').css({'border':'1px solid red'});				
			}
		}else{
			$('#page4inputPasCurrut').css({'border':'1px solid red'});
			$('#page4inputPasNew').css({'border':'1px solid red'});
			$('#page4inputPasReNew').css({'border':'1px solid red'});		
		}

	// page4inputPasCurrut
	// page4inputPasNew
	// page4inputPasReNew

}











