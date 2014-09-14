<?php
$initiatenewoptions = new new_general_settings();
class new_general_settings {
	function new_general_settings( ) {
		add_filter( 'admin_init' , array( $this , 'register_new_fields' ) );
	}
	
	function register_new_fields() {
		add_settings_section(  
			'social_media_links',
			'Social Media links',
			array( $this, 'description' ),
			'general'
		);
		
		/*
		 * Add here your options
		 */
		
		$fields = array (
			'facebook_field'		=> 'Facebook',
			'twitter_field'			=> 'Twitter',
			'linkedin_field'		=> 'Linkedin'
		);
		
		foreach ( $fields as $field => $value ) {
			add_settings_field(
				$field,
				$value,
				array($this, 'text_inputs'),
				'general',
				'social_media_links',
				array( $field )  
			); 
			register_setting( 'general', $field, 'esc_attr' );
		}
	}
	
	function text_inputs( $args ) {
		$option = get_option( $args[0] );
		echo '<input type="text" id="'.$args[0].'" name="'.$args[0].'" value="' . $option . '" />';
	}
	
	function description() {
		echo '<p>Your description of the section goes here</p>';
	}
}