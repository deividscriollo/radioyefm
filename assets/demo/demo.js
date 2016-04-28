stylesheet='<link href="demo/demo.css" rel="stylesheet" type="text/css">'
$('head').append(stylesheet);

var isPanelOpended = false;
var switcher = '<div id="style-switcher"><div id="toggle-button" class="vc_main-color"><i class="fa fa-cogs"></i></div>';
switcher += '<h3 id="color-text" class="demo"><i class="fa fa-tint vc_main-color"></i> Colors</h3>';
switcher += '<ul class="color-list">';
switcher += '<li><a id="blue" href="javascript:;"></a></li>';
switcher += '<li><a id="green" href="javascript:;"></a></li>';
switcher += '<li><a id="red" href="javascript:;"></a></li>';
switcher += '<li><a id="orange" href="javascript:;"></a></li>';
switcher += '<li><a id="yellow" href="javascript:;"></a></li>';
switcher += '<li><a id="purple" href="javascript:;"></a></li>';
switcher += '</ul><div class="clearfix"></div><br/>';
switcher += '<h3 id="layout-text" class="demo"><i class="fa fa-tablet vc_main-color"></i> Layout</h3>';
switcher += '<ul id="page-type" class="text-type">';
switcher += '<li><a id="boxed" href="javascript:;">Boxed</a></li>';
switcher += '<li class="active"><a id="full"  href="javascript:;">Full</a></li>';
switcher += '</ul><div class="clearfix"></div><br/>';
switcher += '<h3 id="background-text" class="demo"><i class="fa fa-magic vc_main-color" ></i> Backgrounds</h3>';
switcher += '<ul id="bg-list">';
switcher += '<li><a id="bg1" href="javascript:;"><img src="img/pattern/pattern1.png" alt=""></a></li>';
switcher += '<li><a id="bg2" href="javascript:;"><img src="img/pattern/pattern2.png" alt=""></a></li>';
switcher += '<li><a id="bg3" href="javascript:;"><img src="img/pattern/pattern3.png" alt=""></a></li>';
switcher += '<li><a id="bg4" href="javascript:;"><img src="img/pattern/pattern4.png" alt=""></a></li>';
switcher += '<li><a id="bg5" href="javascript:;"><img src="img/pattern/pattern5.png" alt=""></a></li>';
switcher += '<li><a id="bg6" href="javascript:;"><img src="img/pattern/pattern6.png" alt=""></a></li>';
switcher += '<li><a id="bg7" href="javascript:;"><img src="img/pattern/pattern7.png" alt=""></a></li>';
switcher += '<li><a id="bg8" href="javascript:;"><img src="img/pattern/pattern8.png" alt=""></a></li>';
switcher += '<li><a id="bg9" href="javascript:;"><img src="img/pattern/pattern9.png" alt=""></a></li>';
switcher += '<li><a id="bg10" href="javascript:;"><img src="img/pattern/pattern10.png" alt=""></a></li>';
switcher += '<li><a id="bg11" href="javascript:;"><img src="img/pattern/pattern11.png" alt=""></a></li>';
switcher += '<li><a id="bg12" href="javascript:;"><img src="img/pattern/pattern12.png" alt=""></a></li>';
switcher += '<li><a id="bg13" href="javascript:;"><img src="img/pattern/pattern13.png" alt=""></a></li>';
switcher += '<li><a id="bg14" href="javascript:;"><img src="img/pattern/pattern14.png" alt=""></a></li>';
switcher += '</ul><div class="clearfix"></div><br/>';
switcher += '<h3 id="header-design-text" class="demo"><i class="fa fa-suitcase vc_main-color"></i> Header Design</h3>';
switcher += '<ul id="header-design-type" class="combo-type">';
switcher += '<li><select id="header-type"><option value="features-headfoot-1.php" disabled selected>Choose Type</option><option value="features-headfoot-1.html">Header 1</option><option value="features-headfoot-2.html">Header 2</option><option value="features-headfoot-3.html">Header 3</option><option value="features-headfoot-4.html">Header 4</option></select></li>';
switcher += '<li><select id="header-mode"><option value="1"  disabled selected>Choose Mode</option><option value="1">Header Slash</option><option value="2">Header Stylish</option><option value="3">Header Soft</option></select></li>';
switcher += '</ul><div class="clearfix"></div><br/>';
switcher += '<h3 id="footer-design-text" class="demo"><i class="fa fa-cog vc_main-color"></i> Footer Design</h3>';
switcher += '<ul id="footer-design-type" class="combo-type">';
switcher += '<li><select id="footer-type"><option value="features-headfoot-1.php#footer"  disabled selected>Choose Type</option><option value="features-headfoot-1.html#footer">Footer 1</option><option value="features-headfoot-2.html#footer">Footer 2</option><option value="features-headfoot-3.html#footer">Footer 3</option><option value="features-headfoot-4.html#footer">Footer 4</option></select></li>';
switcher += '<li><select id="footer-mode"><option value="1"  disabled selected>Choose Mode</option><option value="1">Footer Slash</option><option value="2">Footer Stylish</option><option value="3">Footer Soft</option></select></li>';
switcher += '</ul><div class="clearfix"></div><br/>';

switcher += '</div>';

$('body').append(switcher);
/*$('#style-switcher').stop().animate({
	left : '-300px'
}, 1000);*/
$('#toggle-button').click(function() {
    if (isPanelOpended) {
        isPanelOpended = false;
        $('#style-switcher').stop().animate({
            left : '-300px'
        }, 300)
    } else {
        isPanelOpended = true;
        $('#style-switcher').stop().animate({
            left : '0'
        }, 300)
    }
});

$('ul.color-list a').click(function() {
    var path = window.location.pathname;
    var link = 'css/color/color-' + $(this).attr('id') + '.css';
    if (path.indexOf('elements/index.html') > 0) {
        link = '../css/color/color-' + $(this).attr('id') + '.css';
    }
	$('head #link-color').attr('href',link);
});

$('#bg-list li a').click(function() {
    if($(this).attr('id') != 'no-bg') {
        $('body').css('background', 'url(' + $(this).find('img').attr('src') + ')');
    } else {
        $('body').removeAttr('style');
    }
    
});
$('#page-type li a').click(function() {
	$(this).parent().siblings().removeClass('active');		
	$(this).parent().addClass('active');	
	
    if($(this).attr('id') == 'boxed') {
		$('body').addClass('boxed');
		$('body').removeClass('sticky-menu-active');
        $('body, header .logo img').removeAttr('style');	
//		$('#bg-list, #background-text').css('display','block');	
												
    } else {	
		$('body').removeClass('boxed');
//		$('#bg-list, #background-text').css('display','none');		
    }  	
	metro_slider();	
});
/*
$('#design-type li a').click(function() {
    var path = window.location.pathname;
    var link = 'css/mode/mode-' + $(this).attr('id') + '.css';
    if (path.indexOf('elements/') > 0) {
        link = '../css/mode/mode-' + $(this).attr('id') + '.css';
    }
	$(this).parent().siblings().removeClass('active');		
	$(this).parent().addClass('active');	
	$('head #link-design').attr('href',link);
});
*/
// bind change event to select
$('#header-design-type #header-type, #footer-design-type #footer-type').bind('change', function () {
  var url = $(this).val(); // get selected value
  if (url) { // require a URL
	  window.location = url; // redirect
  }
  return false;
});

$('#header-design-type #header-mode').bind('change', function () {
  var url = $(this).val(); // get selected value
  var link = 'css/mode/mode-' + url + '-header.css'; 
  var linkr = 'css/mode/mode-' + url + '-header-responsive.css'; 
  $('head #link-header-mode').attr('href',link); 
  $('head #link-header-mode-r').attr('href',linkr);  

  return false;
});

$('#footer-design-type #footer-mode').bind('change', function () {
  var url = $(this).val(); // get selected value
  var link = 'css/mode/mode-' + url + '-footer.css'; 
  var linkr = 'css/mode/mode-' + url + '-footer-responsive.css'; 
  $('head #link-footer-mode').attr('href',link); 
  $('head #link-footer-mode-r').attr('href',linkr);  
  
  return false;
});