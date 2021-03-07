<?php
/************************
***** HOME HELP BLOCK *******
*************************/
add_filter( 'cmb2_admin_init', 'manual_home_page_metaboxes' );
function manual_home_page_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'homeblock_meta',
        'title'         => esc_html__( 'Home Page Help Options', 'manual' ),
        'object_types'  => array( 'manual_hp_block', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name' => 'Block Icon Name',
				'desc' => 'Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name',
		'id'   => $prefix . 'hpblock_icon',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name'    => 'Block Icon Color',
		'id'      => $prefix .'hpblock_icon_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	
	$cmb->add_field( array( 
		'name'    => 'Custom Icon',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => $prefix .'hpblock_custom_icon',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => true, 
		),
		'text'    => array(
			'add_upload_file_text' => 'Upload Image Icon' 
		),
		'preview_size' => 'medium', 
	) );
	
	$cmb->add_field( array(
		'name' => 'Block Text',
		'id'   => $prefix . 'hpblock_text',
		'desc' => 'Text below the block heading (optional)',
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );
	
	$cmb->add_field( array(
		'name' => 'Link URL',
		'id'   => $prefix . 'hpblock_link',
		'desc' => 'Link the block (optional)',
		'type' => 'text_medium',
	) );
	
	$cmb->add_field( array(
		'name' => 'Link Text',
		'id'   => $prefix . 'hpblock_link_text',
		'desc' => 'Will replace Browse ...',
		'type' => 'text_medium',
	) );
	
	$cmb->add_field( array(
		'name'    => 'Block background Color',
		'id'      => $prefix .'hpblock_bg_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	
	$cmb->add_field( array(
		'name'    => 'Block Text Color',
		'id'      => $prefix .'hpblock_text_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	
	$cmb->add_field( array(
		'name'    => 'Link Color',
		'id'      => $prefix .'hpblock_link_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	
}

/************************
***** HOME ORG BLOCKS *******
*************************/
add_filter( 'cmb2_admin_init', 'manual_home_org_page_metaboxes' );
function manual_home_org_page_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'home_org_block_meta',
        'title'         => esc_html__( 'Organization Blocks', 'manual' ),
        'object_types'  => array( 'manual_org_block', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name' => 'Block Icon Name',
		'desc' => 'Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name',
		'id'   => $prefix . 'hpblock_icon',
		'type' => 'text',
	) );
	
	$cmb->add_field( array( 
		'name'    => 'Custom Icon',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => $prefix .'hpblock_custom_icon',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => true, 
		),
		'text'    => array(
			'add_upload_file_text' => 'Upload Image Icon' 
		),
		'preview_size' => 'medium', 
	) );

	
	$cmb->add_field( array(
		'name' => 'Block Text',
		'id'   => $prefix . 'hpblock_text',
		'desc' => 'Text below the block heading (optional)',
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );


}

/************************
***** TESTIMONIAL *******
*************************/
add_filter( 'cmb2_admin_init', 'manual_home_testimonial_metaboxes' );
function manual_home_testimonial_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'home_testimonial_meta',
        'title'         => esc_html__( 'Testimonial', 'manual' ),
        'object_types'  => array( 'manual_tmal_block', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	
	$cmb->add_field( array(
		'name' => 'Person Name',
		'id'   => $prefix . 'hpblock_name',
		'type' => 'text',
	) );
	
	
	$cmb->add_field( array(
		'name' => 'Message',
		'id'   => $prefix . 'hpblock_text',
		'desc' => 'The text below the block heading (optional)',
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );
	
}

?>