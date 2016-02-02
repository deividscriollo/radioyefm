<?php

add_shortcode( 'dt_testimonials', 'dt_print_widget_testimonials' );
function dt_print_widget_testimonials( $atts ) {
    extract(
        shortcode_atts(
            array(
                'title'     => '',
                'order'     => 'DESC',
                'orderby'   => 'date',
                'ppp'       => 6,
                'except'    => '',
                'only'      => '',
                'autoslide' => '',
                'column'    => 'half'
            ),
            $atts
        )
    );

    $args = array(
        'before_widget' => '<div class="' . esc_attr($column) .'">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    );
    
    $select = 'all';
    $cats =  array();
    
    if( $except ) {
        $select = 'except';
        $cats = array_map('trim', explode(',', $except));
    }

    if( $only ) {
        $select = 'only';
        $cats = array_map('trim', explode(',', $only));
    }

    ob_start();
    
    $params = array( 
        "title"     => $title,
        "show"      => $ppp,
        "order"     => $order,
        "orderby"   => $orderby,
        "autoslide" => $autoslide,
        "select"    => $select
    );

    if( $cats )
        $params['cats'] = $cats;

    the_widget( 'DT_testimonials_Widget', $params, $args );

    $output = ob_get_clean();
    return $output;
}

add_action( 'wp_ajax_dt_ajax_editor_testimonials', 'dt_ajax_editor_testimonials' );
function dt_ajax_editor_testimonials() {
    $box_name = 'dt_testimonials_layout';
    
    $terms = get_categories(
        array(
            'type'                     => 'dt_testimonials',
            'hide_empty'               => 1,
            'hierarchical'             => 0,
            'taxonomy'                 => 'dt_testimonials_category',
            'pad_counts'               => false
        )
    );
    
    $html = '';

    ob_start();
    ?>

    <fieldset style="padding-left: 15px;">
        <legend> Title: </legend>
        <input type="text" value="" name="dt_mce_window_testimonials_title" id="dt_mce_window_testimonials_title">
    </fieldset>

    <?php
    // print select list
    dt_admin_select_list(
        array(
            'rad_butt_name'     => 'show_type_gallery',
            'checkbox_name'     => 'show_gallery',
            'terms'             => &$terms,
            'con_class'         => 'dt_mce_gal_list',
            'before_element'    => '<fieldset style="padding-left: 15px;">',
            'after_element'     => '</fieldset>',
            'before_title'      => '<legend>',
            'after_title'       => '</legend>'
        )    
    );

    $html .= ob_get_clean();
    
    add_filter( 'dt_admin_page_option_ppp-options', 'dt_shortcbuilder_photos_ppp_filter' );
    add_filter( 'dt_admin_page_option_orderby-options', 'dt_shortcbuilder_photos_orderby_filter' );
    add_filter( 'dt_admin_page_option_order-options', 'dt_shortcbuilder_photos_order_filter' );
    
    $html .= dt_admin_ppp_options(
        array(
            'options'           => array( 'ppp'   => 6 ),
            'box_name'          => 'dt_mce_window_testimonials'
        ),
        false
    );
    
    $html .= dt_admin_order_options(
        array(
            'options'           => array(
                'orderby'   => 'date',
                'order'     => 'DESC'
            ),
            'box_name'          => 'dt_mce_window_testimonials',
            'before_element'    => '<fieldset style="padding-left: 15px;">',
            'after_element'     => '</fieldset>'
        ),
        false
    );

    ob_start();
    ?>

    <fieldset style="padding-left: 15px;">
        <legend> Autoslide: </legend>
        <input type="text" value="0" name="dt_mce_window_testimonials_autoslide" id="dt_mce_window_testimonials_autoslide">
		<em>milliseconds (1 second = 1000 milliseconds; to disable autoslide leave this field blank or set it to "0")</em>
    </fieldset>
    
    <fieldset style="padding-left: 15px;">
         <legend> Column: </legend>
         <select name="dt_mce_window_testimonials_column" id="dt_mce_window_testimonials_column">

         <?php
         $columns = array( 'one-fourth', 'three-fourth', 'one-third', 'two-thirds', 'half', 'full-width' );
         foreach( $columns as $column ):
         ?>

         <option value="<?php echo $column; ?>"><?php echo $column; ?></option>

         <?php endforeach; ?>

         </select>
    </fieldset>

    <?php
    $html .= ob_get_clean();

	// generate the response
    $response = json_encode(
		array(
			'html_content'	=> $html
		)
	);

	// response output
    header( "Content-Type: application/json" );
    echo $response;

    // IMPORTANT: don't forget to "exit"
    exit;
}

$tinymce_button = new dt_add_mce_button(
    'dt_mce_plugin_shortcode_widget_testimonials',
    'widget-testimonials',
    false
);

add_filter( 'jpb_visual_shortcodes', 'dt_testimonials_images_filter' );
function dt_testimonials_images_filter( $shortcodes ) {
    array_push(
        $shortcodes,
        array(
            'shortcode' => 'dt_testimonials',
            'image'     => DT_SHORTCODES_URL . '/images/space.png',
            'command'   => 'dt_mce_command-widget_testimonials'
        )    
    );
    return $shortcodes;
}
