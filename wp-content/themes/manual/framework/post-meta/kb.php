<?php
/**
 * KNOWLEDGEBASE :: ADD - 1
 */
add_filter( 'cmb2_admin_init', 'manual_kb_metaboxes' );
function manual_kb_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'kb_page_options',
        'title'         => esc_html__( 'Header Image', 'manual' ),
        'object_types'  => array( 'manual_kb', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name'    => 'Header Image',
		'desc'    => 'Upload post header image (use only if required)',
		'id'      => $prefix . 'header_image',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => true, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add or Upload Image' // Change upload button text. Default: "Add or Upload File"
		),
		'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );
	
	$cmb->add_field( array(
		'name' => 'Remove Nav Background',
		'desc' => 'If checked, transparent background will be removed from the header nav bar',
		'id'   => $prefix . 'remove_nav_bg',
		'type' => 'checkbox',
	) );
	
	$cmb->add_field( array(
		'name' => 'Remove Background Opacity For the Upload Image',
		'id'   => $prefix . 'bg_opacity_uploadimg',
		'type' => 'checkbox',
	) );
	
	$cmb->add_field( array(
		'name'    => 'Header Height',
		'desc'    => '(omit px) Equal top/bottom padding',
		'id'      => $prefix . 'header_height',
		'type'    => 'text_small',
	) );
	
}

/**
 * KNOWLEDGEBASE :: ADD - 2
 */
add_filter( 'cmb2_admin_init', 'manual_kb_two_metaboxes' );
function manual_kb_two_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'kb_add_files',
        'title'         => esc_html__( 'Attached Files', 'manual' ),
        'object_types'  => array( 'manual_kb', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	$cmb->add_field( array(
		'name' => 'Allow attached files access to only login users',
		'desc' => 'If checked only login users can download attachment',
		'id' => $prefix . 'attachement_access_status',
		'type' => 'checkbox',
	) );
	
	
	$cmb->add_field( array(
		'name'    => 'Login Message',
		'desc'    => 'Your short description',
		'id' => $prefix . 'attachement_access_login_msg',
		'type'    => 'text',
	) );
	
	
	$group_kb_attached = $cmb->add_field( array(
		'id'          => $prefix . 'custom_post_attached_files',
		'type'        => 'group',
		// 'repeatable'  => false, 
		'options'     => array(
			'group_title'   => __( 'Attachment {#}', 'manual' ), 
			'add_button'    => __( 'Add Another Entry', 'manual' ),
			'remove_button' => __( 'Remove Entry', 'manual' ),
			'sortable'      => true, // beta
		),
	));
	
	$cmb->add_group_field( $group_kb_attached, array(
		'name' => 'Files/Image',
		'id'   => 'image',
		'type' => 'file',
		'preview_size' => 'small'
	) );
	
	$cmb->add_group_field( $group_kb_attached, array(
		'name' => 'Open file in the new window',
		'desc' => 'Check to open file in the new window',
		'id'   => 'new_window',
		'type' => 'checkbox',
	) );
	
}

/**
 * KNOWLEDGEBASE CAT
 */
 
/** Add Custom Field To Category Form */
add_action( 'manualknowledgebasecat_add_form_fields', 'manual_kb_category_field_add', 10 );
add_action( 'manualknowledgebasecat_edit_form_fields', 'manual_kb_category_field_edit', 10, 2 );
 
function manual_kb_category_field_add( $taxonomy ) {
	global $wp_roles;
?>
<div style="background: #F8F7F7; border: 1px solid #E4E4E4;  padding: 8px 5px 5px 20px; margin:20px 0px;">
   
    <h3>KnowledgeBase Access Control</h3>
    <div class="form-field">
      <input type="checkbox" name="kb_cat_check_login" id="kb_cat_check_login" value="1" />
      <span><strong>Allow access only for the login users</strong></span>
      <p class="description">Only login users can have access</p>
    </div>
    
    <div class="form-field">
    <div><strong>User Role</strong></div>
    <?php 
    $wp_roles = new WP_Roles();
    $roles = $wp_roles->get_names();
    foreach ($roles as $role_value => $role_name) {
        echo '<p><input type="checkbox" name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
    }
    ?>
    <br>
    <p class="description">KnowledgeBase will limit to above define user roles</p>
    </div>
    
    <div class="form-field">
      <span><strong>Login Message</strong></span>
      <input type="text" name="kb_cat_login_message" id="kb_cat_login_message" />
    </div>
</div>

<label for="tag-description">Icon Name</label>
<input type="text" name="kb_cat_icon_name" id="kb_cat_icon_name" size="40" />
<p>Custom icon that will appear before category name</p>
<p class="cmb2-metabox-description">Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name</p>
<br>
    
<?php
}

function manual_kb_category_field_edit( $tag, $taxonomy ) {
	global $wp_roles;
	
    $option_name = 'kb_cat_check_login_' . $tag->term_id;
    $category_custom_order = get_option( $option_name );
	
	$option_role = 'kb_cat_user_role_' . $tag->term_id;
    $accessby_user_role = get_option( $option_role );
	
    $option_name_msg = 'kb_cat_login_message_' . $tag->term_id;
    $category_custom_login_message = get_option( $option_name_msg );
	
	$icon_name = 'kb_cat_icon_name_' . $tag->term_id;
    $icon_name_code = get_option( $icon_name );
	
?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="category_custom_order">Category access</label></th>
  <td>
    <input type="checkbox" name="kb_cat_check_login" id="kb_cat_check_login" value="1" <?php echo esc_attr( $category_custom_order == 1 ) ? 'checked' : ''; ?> />
    <span class="description">Only for the login users</span>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="category_user_access">User Role</label></th>
  <td>
    <?php 
	$wp_roles = new WP_Roles();
	$roles = $wp_roles->get_names();
	$current_value = unserialize($accessby_user_role);
	foreach ($roles as $role_value => $role_name) {
		if ( $current_value != '' && in_array($role_value, $current_value)) $checked = 'checked';
		else $checked = '';
		echo '<p><input type="checkbox" '.$checked.' name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
  	}
	?>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="category_login_message">Login Message</label></th>
  <td>
    <input type="text" name="kb_cat_login_message" id="kb_cat_login_message" value="<?php echo esc_html($category_custom_login_message); ?>" />
  </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top"><label for="category_custom_order">Icon Name</label></th>
    <td>
        <input type="text" name="kb_cat_icon_name" id="kb_cat_icon_name" size="40" value="<?php echo esc_html($icon_name_code); ?>" />
        <span class="description">Custom icon that will appear before category name</span>
        <p class="cmb2-metabox-description">Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name</p>
    </td>
</tr>

<?php
}
 
/** Save Custom Field Of Category Form */
add_action( 'created_manualknowledgebasecat', 'manual_kb_category_field_save', 10, 2 ); 
add_action( 'edited_manualknowledgebasecat', 'manual_kb_category_field_save', 10, 2 );
 
function manual_kb_category_field_save( $term_id, $tt_id ) {
	$option_name = 'kb_cat_check_login_' . $term_id;
	$option_role = 'kb_cat_user_role_' . $term_id;
	$option_login_message = 'kb_cat_login_message_' . $term_id;
	$option_cat_icon_name = 'kb_cat_icon_name_' . $term_id;
	
	
	if ( isset( $_POST['kb_cat_check_login'] ) && $_POST['kb_cat_check_login'] != '' ) {           
        update_option( $option_name, $_POST['kb_cat_check_login'] );
    } else {
        update_option( $option_name, '' );
	}
	
	if ( isset( $_POST['user_role'] ) && $_POST['user_role'] != '' ) {           
        update_option( $option_role, serialize($_POST['user_role']) );
    } else {
        update_option( $option_role, '' );
	}
	
    if ( isset( $_POST['kb_cat_login_message'] ) && $_POST['kb_cat_login_message'] != '' ) {           
        update_option( $option_login_message, stripslashes($_POST['kb_cat_login_message']) );
    } else {
        update_option( $option_login_message, '' );
	}
	
	if ( isset( $_POST['kb_cat_icon_name'] ) && $_POST['kb_cat_icon_name'] != '' ) {           
        update_option( $option_cat_icon_name, stripslashes($_POST['kb_cat_icon_name']) );
    } else {
        update_option( $option_cat_icon_name, '' );
	}
		
}

?>