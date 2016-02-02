<?php
// portfolio images
function dt_shortcode_portfolio( $atts ) {
    global $post;  
    $temp = clone $post;
    
    extract(
        shortcode_atts(
            array(
                "ppp"       => 3,
                "orderby"   => 'Date',
                "order"     => 'DESC',
                "class"     => 'benefits',
                "except"    => '',
                "only"      => ''
            ),
            $atts
        )
    );
    
    $output = $temp_cat = '';
    
    $args = array(
        'post_type'     => 'dt_portfolio',
        'post_status'   => 'publish',
        'orderby'       => $orderby,
        'order'         => $order
    );
    
    if( $ppp ) {
        $args['posts_per_page'] = $ppp;
    }
    
    if( $except || $only ) {
        
        if( $only ) {
            $temp_cat = explode( ',', str_replace( ' ', '', $only) );
        }elseif( $except ) {
            $temp_cat = explode( ',', str_replace( ' ', '', $except) );
        }
        
        $args['tax_query'] = array(	
            array(
                'taxonomy'	=> 'dt_portfolio_category',
                'field'		=> 'id',
                'terms'		=> $temp_cat,
                'operator' 	=> ($except?'NOT IN':'IN')
            )
        );
    }
    
    $query = new Wp_Query( $args );
    
    if( $query->have_posts() ) {
        $output .= '<div class="cols '. $class. '">';
        
        while( $query->have_posts() ) {
            $query->the_post();
            
            $defaults = array(
                'quality'   => 100,
                'zc'        => true,
                'zc_align'  => 'c',
                'embed'     => ''
            );
            $opts = get_post_meta( $post->ID, 'dt_post_thumb_opts_options', true );
            $opts = wp_parse_args( $opts, $defaults );
                
            $post_t_id = get_post_thumbnail_id( $post->ID );
            $img = dt_get_thumbnail(
                array(
                    'img_id'	=> $post_t_id,
                    'width'		=> 290,
                    'height'	=> 150,
                    'upscale'	=> $opts['zc'],
                    'zc_align'  => $opts['zc_align'],
                    'quality'   => $opts['quality']
                )
            );
            
            $output .= '<a class="col_1-3" href="'. get_permalink($post->ID). '">';
            
            $output .= sprintf(
                '<img src="%s" alt="%s" />
                <div class="mask"></div>
                <div class="desc">
                <h4>%s</h4>
                <div class="desc_text">%s</div>
                </div>',
                $img['thumnail_img'],
                esc_attr($post->post_title),
                apply_filters('the_title', $post->post_title),
                apply_filters('the_excerpt', get_the_excerpt() )
            );
              
            $output .= '</a>';
        }
        
        $output .= '</div>'; 
    }
    
    $post = $temp;
    
    return $output;
}

// gallery
function dt_shortcode_gallery( $atts ) {    
    global $post;
    
    $temp = clone $post;
    
    extract(
        shortcode_atts(
            array(
                "ppp"       => -1,
                "orderby"   => 'Date',
                "order"     => 'DESC',
                "class"     => ' benefits',
                "except"    => '',
                "only"      => ''
            ),
            $atts
        )
    );
    
    $output = $temp_cat = '';
    
    $args = array(
        'post_type'	        => 'dt_gallery',
        'orderby'           => $orderby,
        'order'             => $order,
        'posts_per_page'    => intval( $ppp )
    );
    
    if( $except || $only ) {
        
        if( $only ) {
            $temp_cat = explode( ',', str_replace( ' ', '', $only) );
        }elseif( $except ) {
            $temp_cat = explode( ',', str_replace( ' ', '', $except) );
        }
        
        $args['tax_query'] = array(	
            array(
                'taxonomy'	=> 'dt_gallery_category',
                'field'		=> 'id',
                'terms'		=> $temp_cat,
                'operator' 	=> ($except?'NOT IN':'IN')
            )
        );
    }
    
    $query = new Wp_Query( $args );
    add_filter( 'the_excerpt', 'dt_password_excerpt' );
    add_filter( 'the_password_form', 'dt_gallery_passform' );
    
    ob_start();
    
    if( $query->have_posts() ):
    ?>
    <div class="cols<?php echo esc_attr( $class ); ?>">
        <?php
        while( $query->have_posts() ) {
            $query->the_post();
            get_template_part('dt_gallery', 'content');
        }
        ?>
    </div>    
    <?php
    endif;
    
    $output = ob_get_clean();
    
    remove_filter( 'the_excerpt', 'dt_password_excerpt' );
    remove_filter( 'the_password_form', 'dt_gallery_passform' );
    
    $post = $temp;
    
    return $output;
}

// photos
function dt_shortcode_photos( $atts ) {
    global $wpdb, $post;
    extract(
        shortcode_atts(
            array(
                "ppp"       => 3,
                "orderby"   => 'Date',
                "order"     => 'DESC',
                "class"     => ' benefits',
                "except"    => '',
                "only"      => ''
            ),
            $atts
        )
    );
                        
    // select ID of the albums in selected taxonomy
    $in_select = $list = '';
    if( $except || $only ) {
        $list = $only;
        $in_select .= sprintf( ' AND %s.term_id', $wpdb->term_taxonomy );
        if( $except ) {
            $in_select .= ' NOT';
            $list = $except;
        }
        $in_select .= sprintf( ' IN(%s)', $list );
    }
    
    $query_str = sprintf(
        'SELECT %3$s.ID FROM %1$s 
        JOIN %2$s ON %1$s.term_taxonomy_id = %2$s.term_taxonomy_id 
        JOIN %3$s ON %2$s.object_id = %3$s.ID
        WHERE %1$s.taxonomy = "%4$s" AND %3$s.post_status = "publish"%5$s
        GROUP BY %3$s.ID',
        $wpdb->term_taxonomy,
        $wpdb->term_relationships,
        $wpdb->posts,
        'dt_gallery_category',
        $in_select
    );

    dt_get_where_filter_params( $query_str );
                            
    $args = array(
        'post_type' 		=> 'attachment', 
        'post_mime_type'	=> 'image',
        'post_status' 		=> 'inherit',
        'orderby'           => $orderby,
        'order'             => $order,
        'posts_per_page'    => $ppp
    );

    // mpdify query
    add_filter( 'posts_where' , 'dt_posts_parents_where' );
    $wp_query = new Wp_Query( $args );
    remove_filter( 'posts_where' , 'dt_posts_parents_where' );
    
    remove_filter( 'the_content', 'prepend_attachment' );
    
    ob_start();
    ?>
    
        <?php if( $wp_query->have_posts() ): ?>
        
            <div class="cols benefits highslide-gallery<?php echo esc_attr( $class ); ?>">
            <?php
            while( $wp_query->have_posts() ) {
                $wp_query->the_post();
                get_template_part('dt_photos', 'content');            
            };
            ?>
            
            </div>
            
        <?php endif; ?>

    <?php
    $output = ob_get_clean();
    
    add_filter( 'the_content', 'prepend_attachment' );
    wp_reset_query();
    
    return $output;
}

// print widget
function dt_print_widget_latposts( $atts ) {
    extract(
        shortcode_atts(
            array(
                "ppp"       => 3,
                "title"     => '',
//                "category"  => 'Undefined',
                "align"     => 'left'
            ),
            $atts
        )
    );
    
    $dt_class = 'position-left';
    if( 'right' == $align ) {
        $dt_class = 'position-right';
    }
    
    $args = array(
        'before_widget' => '<div class="col_1-3 ' . $dt_class. '">',
        'after_widget'  => '</div>',
        'before_title'  => '<h1>',
        'after_title'   => '</h1>'
    );
    
    ob_start();
    the_widget(
        'DT_recent_post',
        'title='. $title. '&show='. $ppp,//. '&category='. $category,
        $args
    );
    $output = ob_get_clean();
    return $output;
}

/* homepage shortcodes end */

/* shortcodes: begin */

function clear() {
    return '<div class="clearfix"></div>';
}

function one_fourth($atts, $content = null, $align = null) {
	extract(shortcode_atts(array(
		"align" => '',
		"last" => ''
	), $atts)); 
	
	foreach (explode(" ", "align last") as $k)
	{
	   if ( !isset($atts[$k]) )
	      $atts[$k] = "";
	   if ( !isset($$k) )
	      $$k = "";
	}
	
    $last_div = '';
    
	if ($atts['align']=='right') {
        $align=' right_align';
    }
    if ($atts['last']=='true' or $atts['last']=='yes' or $atts['last']=='t' or $atts['last']=='y'  or $atts['last']=='1') {
        $align = $align.' last_col';
        $last_div = '<div class="clearfix"></div>';
    }
    return '<div class="one-fourth'.$align.'">'.do_shortcode($content).'</div>'.$last_div;
}

function three_fourth($atts, $content = null, $align = null) {
	extract(shortcode_atts(array(
		"align" => '',
		"last" => ''
	), $atts)); 
	
	foreach (explode(" ", "align last") as $k)
	{
	   if ( !isset($atts[$k]) )
	      $atts[$k] = "";
	   if ( !isset($$k) )
	      $$k = "";
	}
	
    $last_div = '';
	$atts = (array)$atts;
	if ($atts['align']=='right') {
        $align=' right_align';
	}
    
    if ($atts['last']=='true' or $atts['last']=='yes' or $atts['last']=='t' or $atts['last']=='y'  or $atts['last']=='1') {
        $align = $align.' last_col';
        $last_div = '<div class="clearfix"></div>';
    }
    
    return '<div class="three-fourth'.$align.'">'.do_shortcode($content).'</div>'. $last_div;
}

function one_third($atts, $content = null, $align = null) {
	extract(shortcode_atts(array(
		"align" => '',
		"last" => ''
	), $atts));
	
	foreach (explode(" ", "align last") as $k)
	{
	   if ( !isset($atts[$k]) )
	      $atts[$k] = "";
	   if ( !isset($$k) )
	      $$k = "";
	}
    
	$last_div = '';
	if ($atts['align']=='right') {
        $align=' right_align';
    }
    
	if ($atts['last']=='true' or $atts['last']=='yes' or $atts['last']=='t' or $atts['last']=='y'  or $atts['last']=='1') {
        $align = $align.' last_col';
        $last_div = '<div class="clearfix"></div>';
    }
    
    return '<div class="one-third'.$align.'">'.do_shortcode($content).'</div>'.$last_div;
}

function two_third($atts, $content = null, $align = null) {
	extract(shortcode_atts(array(
		"align" => '',
		"last" => ''
	), $atts)); 
	
	foreach (explode(" ", "align last") as $k)
	{
	   if ( !isset($atts[$k]) )
	      $atts[$k] = "";
	   if ( !isset($$k) )
	      $$k = "";
	}
    
    $last_div = '';
	if ($atts['align']=='right') {
        $align=' right_align';
	}
    
    if ($atts['last']=='true' or $atts['last']=='yes' or $atts['last']=='t' or $atts['last']=='y'  or $atts['last']=='1') {
        $align = $align.' last_col';
        $last_div = '<div class="clearfix"></div>';
    }
    
    $out = '<div class="two-third'.$align.'">'.do_shortcode($content).'</div>'.$last_div;
        
    return $out;
}

function one_half($atts, $content = null) {
	extract(shortcode_atts(array(
		"align" => '',
		"last" => ''
	), $atts)); 
	
	foreach (explode(" ", "align last") as $k)
	{
	   if ( !isset($atts[$k]) )
	      $atts[$k] = "";
	   if ( !isset($$k) )
	      $$k = "";
	}
    
	$last_div = '';
	if ($atts['align']=='right') {
        $align=' right_align';
    }
    
	if ($atts['last']=='true' or $atts['last']=='yes' or $atts['last']=='t' or $atts['last']=='y'  or $atts['last']=='1') {
        $align = $align.' last_col';
        $last_div = '<div class="clearfix"></div>';
    }
    
		return '<div class="one-half'.$align.'">'.do_shortcode($content).'</div>'.$last_div;
}

function frame( $atts, $content = null, $align = null ) {
	extract(shortcode_atts(array(
		"align" => ''
	), $atts)); 
	
	foreach (explode(" ", "align frame last") as $k)
	{
	   if ( !isset($atts[$k]) )
	      $atts[$k] = "";
	   if ( !isset($$k) )
	      $$k = "";
	}

    return '<span class="blog_ico">' . do_shortcode(trim($content)) . '</span>';
}
add_shortcode( 'frame', 'frame' );

function question($atts, $content = null) {
	extract(shortcode_atts(array(
		"frame" => ''
	), $atts)); 
	if ($atts['frame']=='true' or $atts['frame']=='yes' or $atts['frame']=='t' or $atts['frame']=='y'  or $atts['frame']=='1') $frame=' framed';
    return '<div class="question'.$frame.'"><div class="que_ico"></div>'.$content.'</div>';
}
add_shortcode('question', 'question');

function alert($atts, $content = null) {
	extract(shortcode_atts(array(
		"frame" => ''
	), $atts));
	if ($atts['frame']=='true' or $atts['frame']=='yes' or $atts['frame']=='t' or $atts['frame']=='y'  or $atts['frame']=='1') $frame=' framed';
    return '<div class="alert'.$frame.'"><div class="alert_ico"></div>'.$content.'</div>';
}
add_shortcode('alert', 'alert');

function approved($atts, $content = null) {
	extract(shortcode_atts(array(
		"frame" => ''
	), $atts)); 
	if ($atts['frame']=='true' or $atts['frame']=='yes' or $atts['frame']=='t' or $atts['frame']=='y'  or $atts['frame']=='1') $frame=' framed';
    return '<div class="approved'.$frame.'"><div class="approved_ico"></div>'.$content.'</div>';
}
add_shortcode('approved', 'approved');

function fb_img_caption_shortcode( $e, $attr, $content ) {
	extract(shortcode_atts(array(
        'id'    => '',
        'align'    => 'alignnone',
        'width'    => '',
        'caption' => ''
    ), $attr));
 
    if ( 1 > (int) $width || empty($caption) )
        return $content;
 
    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
 
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (int) $width . 'px">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_filter( 'img_caption_shortcode', 'fb_img_caption_shortcode', 15, 3 );

add_shortcode('caption', 'img_caption_shortcode');


/* shortcodes: end */
