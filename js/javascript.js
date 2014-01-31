jQuery(document).ready(function($){

	/* prepend menu icon */
	$('#nav-wrap').prepend('<div id="menu-icon"></div>');
	
	/* toggle nav */
	$("#menu-icon").on("click", function(){
		$("#nav").slideToggle();
		$(this).toggleClass("active");
	});

});

function hideshow(id) {
  var obj = document.getElementById(id);
  if(obj.style.display=='block') {

    obj.style.display ='none';
    
  } else {

    obj.style.display ='block';
  }
};

function capitalize(s){
return s.toLowerCase().replace( /\b./g , function(a){ return a.toUpperCase(); } );
};

$(document).on("click", ".links", function(){
    var error='';
    var error2='';
    var error3='';
    var error4='';
    var error5='';
    var error6='';
    var error7='';
    var quotetype=document.getElementById('myonoffswitch');
    if(this.id=='page2') {
      var insured=quoteform.insured;
      insured.value = capitalize(insured.value);
      if(insured.value==''){
        error='Please enter Insured Name.';
      } else if(!(/[a-zA-Z]\s[a-zA-z]/.test(insured.value))){
        error='Please enter Full Name of Insured.';
      }
      var street = quoteform.address1;
      street.value = capitalize(street.value);
      if(street.value=='') {
        if(quotetype.checked!=true) {
          error2='Please enter Street Address.';
        }
      } else if(!(/[a-zA-Z0-9]*\s[a-zA-z]*\s[a-zA-z]/.test(street.value))){
        if(quotetype.checked!=true) {
          error2='Please enter Full Street Address.';
        }
      }
      var suburb = quoteform.suburb;
      suburb.value = capitalize(suburb.value);
      if(street.value=='') {
        if(quotetype.checked!=true) {
          error3='Please enter Surburb.';
        }
      }
      var state=document.getElementById('state')[document.getElementById('state').selectedIndex].innerHTML;
      if(state=='State') {
        error4='Please Select State.';
      }
      var postcode = quoteform.postcode;
      if(postcode.value=='') {
        if(quotetype.checked!=true) {
          error5='Please enter Postcode.';
        }
      }
      var project=document.getElementById('project')[document.getElementById('project').selectedIndex].innerHTML;
      if(project=='Description of Works') {
        if(quotetype.checked!=true) {
          error6='Please Select Description of Works.';
        }
      }
      var value=quoteform.value;
      if(value.value=='') {
        error7='Please enter Project Value.';
      }
      var address1=quoteform.address1;
      address1.value = capitalize(address1.value);
      var suburb=quoteform.suburb;
      suburb.value = capitalize(suburb.value);
    }
    
    var popuptext = document.getElementById('popuptext');
    if(error!=''){ 
      popuptext.innerHTML=error;
      hideshow('popup');
    } else if(error2!=''){
      popuptext.innerHTML=error2;
      hideshow('popup');
    } else if(error3!=''){
      popuptext.innerHTML=error3;
      hideshow('popup');
    } else if(error4!=''){
      popuptext.innerHTML=error4;
      hideshow('popup');
    } else if(error5!=''){
      popuptext.innerHTML=error5;
      hideshow('popup');
    } else if(error6!=''){
      popuptext.innerHTML=error6;
      hideshow('popup');
    } else if(error7!=''){
      popuptext.innerHTML=error7;
      hideshow('popup');
    } else {
        $(".content").removeClass("inside");
        $(".content").addClass("hidden");
        $("#"+this.id+"_content").addClass("inside");
        $("#"+this.id+"_content").removeClass("hidden");
        window.scrollTo(0,0);
    }
});

function hideshowex(id) {
  var obj = document.getElementById(id);
  var proj = quoteform.project;
  var ex = quoteform.existing;
  var isex = quoteform.isexisting;
  var type = quoteform.onoffswitch;  
  if((proj.value=='Single_Dwelling') || (proj.value=='Single_Dwelling_and_Pool') || (proj.value=='Kit_Home') || (proj.value=='Unit_Duplex_Villa') || (proj.value=='Swimming_Pool') || (proj.value=='Transportable_Dwelling') || (proj.value=='Description of Works') || (type.checked == true)){
    obj.style.display ='none';
    ex.value = '';
  } else {
    obj.style.display ='block';
    isex.value = 'yes';
  }
  var plant = quoteform.plant;
  if(type.checked == true){
    plant.value = '';
  }
};

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
};

function setworkdoneval(id) {

	var obj = document.getElementById(id);
	
	var doneval = quoteform.value;
	
	obj.innerHTML=addCommas(doneval.value);
};

function search(e) {
  var keynum;
  if(window.event){ // IE					
    keynum = e.keyCode;
  }else if(e.which){ // Netscape/Firefox/Opera					
    keynum = e.which;
  }

if((keynum != 39) && (keynum != 192) && (keynum != 222)) {
  if((keynum == 16) || (keynum == 20)){
    var str = document.getElementById('searchstr').value.toLowerCase();
  } else if(keynum == 8) {
    var str = document.getElementById('searchstr').value.toLowerCase();
    str = str.substring(0, str.length - 1);
  } else {
    var str = document.getElementById('searchstr').value.toLowerCase() + String.fromCharCode(keynum).toLowerCase();
  }
  
  var quotes = document.getElementsByClassName('rows');
  var count = 1;
  for(i=0; i < quotes.length; ++i) {
    fullstr = quotes[i].innerHTML.toLowerCase().replace(/\n\b|<.*?>/g,'').toLowerCase();
    if((fullstr.search(str) != -1) && (count < 12)) {
      quotes[i].style.display='block';
      ++count;
    } else {
      quotes[i].style.display='none';
    }
  }
  var morex = document.getElementById('morex');
  if(count >= 11){
    morex.style.display='block';
  } else {
    morex.style.display='none';
  }
  
  var quotes2 = document.getElementsByClassName('rows2');
  var count2 = 1;
  for(i=0; i < quotes2.length; ++i) {
    fullstr = quotes2[i].innerHTML.toLowerCase().replace(/\n\b|<.*?>/g,'').toLowerCase();
    if((fullstr.search(str) != -1) && (count2 < 12)) {
      quotes2[i].style.display='block';
      ++count2;
    } else {
      quotes2[i].style.display='none';
    }
  }
  var morex2 = document.getElementById('morex2');
  if(count2 >= 11){
    morex2.style.display='block';
  } else {
    morex2.style.display='none';
  }
}
}



