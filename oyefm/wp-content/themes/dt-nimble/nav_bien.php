<?php
$logos = array(
	'logo' 			=> dt_get_uploaded_logo( of_get_option( 'branding-header_logo', array() ) ),
	'logo_retina'	=> dt_get_uploaded_logo( of_get_option( 'branding-retina_header_logo', array() ), 'retina' ),
	'mobile' 		=> dt_get_uploaded_logo( of_get_option( 'branding-header_mobile_logo', array() ) ),
	'mobile_retina' => dt_get_uploaded_logo( of_get_option( 'branding-retina_header_mobile_logo', array() ), 'retina' )
);
$default_logo = null;
$alt = get_bloginfo( 'name' );

// get default logo
foreach ( $logos as $logo ) {
	if ( $logo ) { $default_logo = $logo; break; }
}
?>
<header id="header">
	<div id="logo">

		<?php
		if ( $default_logo ):
			$logo = dt_get_retina_sensible_image( $logos['logo'], $logos['logo_retina'], $default_logo, 'id="dt-top-logo" class="dt-top-logo" alt="' . $alt . '"' );
			$logo_mob = dt_get_retina_sensible_image( $logos['mobile'], $logos['mobile_retina'], $default_logo, 'class="dt-top-logo-mobile" alt="' . $alt . '"' );
		?>
			
			<a href="<?php echo home_url(); ?>" class="logo"><?php echo $logo, $logo_mob; ?></a>
			
		<?php endif; ?>

	</div>

	<nav>

		<?php
		dt_menu( array(
			'menu_wraper' 	=> '<ul id="nav">%MENU_ITEMS%</ul>',
			'menu_items'	=> '<li %IS_FIRST%><a class="%ITEM_CLASS%" href="%ITEM_HREF%"%ESC_ITEM_TITLE%>%ITEM_TITLE%</a>%SUBMENU%</li>',
			'submenu' 		=> '<div><ul>%ITEM%</ul></div>'
		) );
		?>

	</nav>
    
    <div id="reproductor">

<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="185" height="101">
          <param name="movie" value="http://www.oyefm.com/aacplayer.swf">
          <param name="quality" value="high">
          <param name="wmode" value="opaque">
          <param name="swfversion" value="9.0.45.0">
          <param name="expressinstall" value="Scripts/expressInstall.swf">
          <object type="application/x-shockwave-flash" data="http://www.oyefm.com/aacplayer.swf" width="185" height="101">
            <param name="quality" value="high">
            <param name="wmode" value="opaque">
            <param name="swfversion" value="9.0.45.0">
            <param name="expressinstall" value="Scripts/expressInstall.swf">                    
          </object>
</object>
        
    </div>
    
</header>