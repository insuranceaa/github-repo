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
    if(this.id=='page2') {
      var insured=quoteform.insured;
      insured.value = capitalize(insured.value);
      if(insured.value==''){
        error='Please enter Insured Name.';
      } else if(!(/[a-zA-Z]\s[a-zA-z]/.test(insured.value))){
        error='Please enter Full Name of Insured.';
      }
      var state=document.getElementById('state')[document.getElementById('state').selectedIndex].innerHTML;
      if(state=='State *') {
        error2='Please Select State.';
      }

      var turnover=quoteform.turnover;
      turnover.value = turnover.value.replace(/\.00$/, "");
      turnover.value = turnover.value.replace(/[^\d]/g, "");
      if(turnover.value=='') {
        error3='Please enter Turnover Value.';
      }
      var value=quoteform.value;
      value.value = value.value.replace(/\.00$/, "");
      value.value = value.value.replace(/[^\d]/g, "");
      if(value.value=='') {
        error4='Please enter Max Project Value.';
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
    } else {
        $(".content").removeClass("inside");
        $(".content").addClass("hidden");
        $("#"+this.id+"_content").addClass("inside");
        $("#"+this.id+"_content").removeClass("hidden");
        window.scrollTo(0,0);
    }
});


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


function search(e) {
  var keynum;
  if(window.event){ // IE					
    keynum = e.keyCode;
  }else if(e.which){ // Netscape/Firefox/Opera					
    keynum = e.which;
  }

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

}



