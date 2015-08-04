<?php
/***************************************************************************
 *						Theme Modules
 * 	----------------------------------------------------------------------
 * 						DO NOT EDIT THIS FILE
 *	----------------------------------------------------------------------
 * 
 *  					Copyright (C) Themify
 * 						http://themify.me
 *
 *  To add custom modules to the theme, create a new 'custom-modules.php' file in the theme folder.
 *  They will be added to the theme automatically.
 * 
 ***************************************************************************/

/**
 * Markup for fixed header selection module
 * @param array $data
 * @return string
 */
function themify_fixed_header_module( $data = array() ) {
	/**
	 * Variable key in theme settings
	 * @var string
	 */
	$key = 'setting-fixed_header_disabled';

	/**
	 * Module markup
	 * @var string
	 */
	$html = sprintf('<p><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
		$key,
		checked( themify_get( $key ), 'on', false ),
		__('Check to disable Fixed Header.', 'themify')
	);

	return $html;
}

/**
 * Default Index Layout Module
 * @param array $data Theme settings data
 * @return string Markup for module.
 * @since 1.0.0
 */
function themify_default_layout( $data = array() ){
	$data = themify_get_data();
	/**
	 * Theme Settings Option Key Prefix
	 * @var string
	 */
	$prefix = 'setting-default_';
	
	if($data[$prefix.'more_text'] == ''){
		$more_text = __('More', 'themify');
	} else {
		$more_text = $data[$prefix.'more_text'];
	}
	/**
	 * Tertiary options <blank>|yes|no
	 * @var array
	 */
	$default_options = array(
		array('name' => '', 'value' => ''),
		array('name' => __('Yes', 'themify'), 'value' => 'yes'),
		array('name' => __('No', 'themify'), 'value' => 'no')
	);
	/**
	 * Post content display options
	 * @var array
	 */
	$default_display_options = array(
		array('name' => __('Full Content', 'themify'),'value' => 'content'),
		array('name' => __('Excerpt', 'themify'),'value' => 'excerpt'),
		array('name' => __('None', 'themify'),'value' => 'none')
	);
	/**
	 * Post layout options
	 * @var array
	 */
	$default_post_layout_options = array(
		array('value' => 'list-post', 'img' => 'images/layout-icons/list-post.png', 'title' => __('List Post', 'themify'), "selected" => true),
		array('value' => 'grid4', 'img' => 'images/layout-icons/grid4.png', 'title' => __('Grid 4', 'themify')),
		array('value' => 'grid3', 'img' => 'images/layout-icons/grid3.png', 'title' => __('Grid 3', 'themify')),
		array('value' => 'grid2', 'img' => 'images/layout-icons/grid2.png', 'title' => __('Grid 2', 'themify')),
		array('value' => 'list-large-image', 'img' => 'images/layout-icons/list-large-image.png', 'title' => __('List Large Image', 'themify')),
		array('value' => 'list-thumb-image', 'img' => 'images/layout-icons/list-thumb-image.png', 'title' => __('List Thumb Image', 'themify')),
		array('value' => 'grid2-thumb', 'img' => 'images/layout-icons/grid2-thumb.png', 'title' => __('Grid 2 Thumb', 'themify')),
	);
	/**
	 * Sidebar placement options
	 * @var array
	 */
	$sidebar_location_options = array(
		array('value' => 'sidebar1', 'img' => 'images/layout-icons/sidebar1.png', 'selected' => true, 'title' => __('Sidebar Right', 'themify')),
		array('value' => 'sidebar1 sidebar-left', 'img' => 'images/layout-icons/sidebar1-left.png', 'title' => __('Sidebar Left', 'themify')),
		array('value' => 'sidebar-none', 'img' => 'images/layout-icons/sidebar-none.png', 'title' => __('No Sidebar', 'themify'))
	);
	/**
	 * Image alignment options
	 * @var array
	 */
	$alignment_options = array(
		array('name' => '', 'value' => ''),
		array('name' => __('Left', 'themify'), 'value' => 'left'),
		array('name' => __('Right', 'themify'), 'value' => 'right')
	);
	/**
	 * Entry media position, above or below the title
	 */
	$media_position = array(
		array('name'=>__('Above Post Title', 'themify'), 'value'=>'above'),
		array('name'=>__('Below Post Title', 'themify'), 'value'=>'below'),
	);
	/**
	 * Module markup
	 * @var string
	 */
	$output = '';
	
	/**
	 * Index Sidebar Option
	 */
	$output .= '<p>
					<span class="label">' . __('Index Sidebar Option', 'themify') . '</span>';
	$val = $data[$prefix.'layout'];
	foreach($sidebar_location_options as $option){
		if(($val == '' || !$val || !isset($val)) && $option['selected']){ 
			$val = $option['value'];
		}
		if($val == $option['value']){ 
			$class = 'selected';
		} else {
			$class = '';
		}
		$output .= '<a href="#" class="preview-icon '.$class.'" title="'.$option['title'].'"><img src="'.THEME_URI.'/'.$option['img'].'" alt="'.$option['value'].'"  /></a>';	
	}
	
	$output .= '	<input type="hidden" name="'.$prefix.'layout" class="val" value="'.$val.'" />
				</p>';
	/**
	 * Post Layout
	 */
	$output .= '<p>
					<span class="label">' . __('Post Layout', 'themify') . '</span>';
	$val = $data[$prefix.'post_layout'];	
	foreach($default_post_layout_options as $option){
		if(($val == '' || !$val || !isset($val)) && $option['selected']){ 
			$val = $option['value'];
		}
		if($val == $option['value']){ 
			$class = 'selected';
		} else {
			$class = '';
		}
		$output .= '<a href="#" class="preview-icon '.$class.'" title="'.$option['title'].'"><img src="'.THEME_URI.'/'.$option['img'].'" alt="'.$option['value'].'"  /></a>';	
	}
	
	$output .= '	<input type="hidden" name="'.$prefix.'post_layout" class="val" value="'.$val.'" />
				</p>';

	/**
	 * Display Content
	 */
	$output .= '<p>
					<span class="label">' . __('Display Content', 'themify') . '</span> 
					<select name="'.$prefix.'layout_display">'.
						themify_options_module($default_display_options, $prefix.'layout_display').'
					</select>
				</p>';
	
	/**
	 * More Text
	 */
	$output .= '<p>
					<span class="label">' . __('More Text', 'themify') . '</span>
					<input type="text" name="'.$prefix.'more_text" value="'.$more_text.'">
				</p>';

	/**
	 * Display more link in excerpt mode
	 */
	$output .= '<span class="pushlabel vertical-grouped"><label for="setting-excerpt_more"><input type="checkbox" value="1" id="setting-excerpt_more" name="setting-excerpt_more" '.checked($data['setting-excerpt_more'], 1, false).'/> ' . __('Display more link button in excerpt mode as well.', 'themify') . '</label></span>';

	/**
	 * Order & OrderBy Options
	 */
	$output .= themify_post_sorting_options('setting-index_order', $data);
				
	/**
	 * Hide Post Title
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Post Title', 'themify') . '</span>
					<select name="'.$prefix.'post_title">' .
						themify_options_module($default_options, $prefix.'post_title') . '
					</select>
				</p>';
	
	/**
	 * Unlink Post Title
	 */
	$output .= '<p>
					<span class="label">' . __('Unlink Post Title', 'themify') . '</span>
					<select name="'.$prefix.'unlink_post_title">' .
						themify_options_module($default_options, $prefix.'unlink_post_title') . '
					</select>
				</p>';
	
	/**
	 * Hide Post Meta
	 */
	$output .= themify_post_meta_options($prefix.'post_meta', $data);
	
	/**
	 * Hide Post Date
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Post Date', 'themify') . '</span>
					<select name="'.$prefix.'post_date">' .
						themify_options_module($default_options, $prefix.'post_date') . '
					</select>
				</p>';
	
	/**
	 * Auto Featured Image
	 */
	$output .= '<p>
					<span class="label">' . __('Auto Featured Image', 'themify') . '</span>
					<label for="setting-auto_featured_image"><input type="checkbox" value="1" id="setting-auto_featured_image" name="setting-auto_featured_image" '.checked($data['setting-auto_featured_image'], 1, false).'/> ' . __('If no featured image is specified, display first image in content.', 'themify') . '</label>
				</p>';
	
	/**
	 * Media Position
	 */
	$output .= '<p>
					<span class="label">' . __( 'Media Position', 'themify' ) . '</span>
					<select name="' . $prefix . 'media_position">' .
						themify_options_module( $media_position, $prefix.'media_position' ) . '
					</select>
				</p>';
	
	/**
	 * Hide Featured Image
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Featured Image', 'themify') . '</span>
					<select name="'.$prefix.'post_image">' .
						themify_options_module($default_options, $prefix.'post_image') . '
					</select>
				</p>';
	
	/**
	 * Unlink Featured Image
	 */
	$output .= '<p>
					<span class="label">' . __('Unlink Featured Image', 'themify') . '</span>
					<select name="'.$prefix.'unlink_post_image">' .
						themify_options_module($default_options, $prefix.'unlink_post_image') . '
					</select>
				</p>';
	
	/**
	 * Featured Image Sizes
	 */
	$output .= themify_feature_image_sizes_select('image_post_feature_size');
	
	/**
	 * Image Dimensions
	 */	
	$output .= '<p>
					<span class="label">' . __('Image Size', 'themify') . '</span>  
					<input type="text" class="width2" name="setting-image_post_width" value="'.$data['setting-image_post_width'].'" /> ' . __('width', 'themify') . ' <small>(px)</small>  
					<input type="text" class="width2" name="setting-image_post_height" value="'.$data['setting-image_post_height'].'" /> ' . __('height', 'themify') . ' <small>(px)</small>
					<br /><span class="pushlabel"><small>' . __('Enter height = 0 to disable vertical cropping with img.php enabled', 'themify') . '</small></span>
				</p>';
	
	/**
	 * Featured Image Alignment
	 */
	$output .= '<p>
					<span class="label">' . __('Featured Image Alignment', 'themify') . '</span>
					<select name="setting-image_post_align">'.
						themify_options_module($alignment_options, 'setting-image_post_align') . '
					</select>
				</p>';
	
	return $output;
}