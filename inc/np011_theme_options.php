<?php

/**
 * Theme Options v1.1.0
 */


	/**
	 * Theme Options Fields
	 * Each option field requires its own uniquely named function. Select options and radio buttons also require an additional uniquely named function with an array of option choices.
	 */

	// Sample checkbox field
	function np011_settings_field_sample_checkbox() {
		$options = np011_get_theme_options();
		?>
		<label for="sample-checkbox">
			<input type="checkbox" name="np011_theme_options[sample_checkbox]" id="sample-checkbox" <?php checked( 'on', $options['sample_checkbox'] ); ?> />
			<?php _e( 'A sample checkbox.', 'np011' ); ?>
		</label>
		<?php
	}

	// Sample text input field
	function np011_settings_field_sample_text_input() {
		$options = np011_get_theme_options();
		?>
		<input type="text" name="np011_theme_options[sample_text_input]" id="sample-text-input" value="<?php echo esc_attr( $options['sample_text_input'] ); ?>" />
		<label class="description" for="sample-text-input"><?php _e( 'Sample text input', 'np011' ); ?></label>
		<?php
	}

	// Options for select options field
	// Used in np011_settings_field_sample_select_options()
	function np011_settings_field_sample_select_options_choices() {
		$sample_select_options = array(
			'0' => array(
				'value' =>  '0',
				'label' => __( 'Zero', 'np011' )
			),
			'1' => array(
				'value' =>  '1',
				'label' => __( 'One', 'np011' )
			),
			'2' => array(
				'value' => '2',
				'label' => __( 'Two', 'np011' )
			),
			'3' => array(
				'value' => '3',
				'label' => __( 'Three', 'np011' )
			),
			'4' => array(
				'value' => '4',
				'label' => __( 'Four', 'np011' )
			),
			'5' => array(
				'value' => '5',
				'label' => __( 'Five', 'np011' )
			)
		);

		return apply_filters( 'np011_settings_field_sample_select_options_choices', $sample_select_options );
	}

	// Sample select options field
	function np011_settings_field_sample_select_options() {
		$options = np011_get_theme_options();
		?>
		<select name="np011_theme_options[sample_select_options]" id="sample-select-options">
			<?php
				$selected = $options['sample_select_options'];
				$p = '';
				$r = '';

				foreach ( np011_settings_field_sample_select_options_choices() as $option ) {
					$label = $option['label'];
					if ( $selected == $option['value'] ) // Make default first in list
						$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
					else
						$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
				}
				echo $p . $r;
			?>
		</select>
		<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', 'np011' ); ?></label>
		<?php
	}

	// Options for radio buttons field
	// Used in np011_settings_field_sample_radio_buttons()
	function np011_settings_field_sample_radio_buttons_choices() {
		$sample_radio_buttons = array(
			'yes' => array(
				'value' => 'yes',
				'label' => __( 'Yes', 'np011' )
			),
			'no' => array(
				'value' => 'no',
				'label' => __( 'No', 'np011' )
			),
			'maybe' => array(
				'value' => 'maybe',
				'label' => __( 'Maybe', 'np011' )
			)
		);

		return apply_filters( 'np011_settings_field_sample_radio_buttons_choices', $sample_radio_buttons );
	}

	// Sample radio buttons field
	function np011_settings_field_sample_radio_buttons() {
		$options = np011_get_theme_options();

		foreach ( np011_settings_field_sample_radio_buttons_choices() as $button ) {
		?>
		<div class="layout">
			<label class="description">
				<input type="radio" name="np011_theme_options[sample_radio_buttons]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['sample_radio_buttons'], $button['value'] ); ?> />
				<?php echo $button['label']; ?>
			</label>
		</div>
		<?php
		}
	}

	// Sample textarea field
	function np011_settings_field_sample_textarea() {
		$options = np011_get_theme_options();
		?>
		<textarea class="large-text" type="text" name="np011_theme_options[sample_textarea]" id="sample-textarea" cols="50" rows="10" /><?php echo esc_textarea( $options['sample_textarea'] ); ?></textarea>
		<label class="description" for="sample-textarea"><?php _e( 'Sample textarea', 'np011' ); ?></label>
		<?php
	}



	/**
	 * Theme Option Defaults & Sanitization
	 * Each option field requires a default value under np011_get_theme_options(), and an if statement under np011_theme_options_validate();
	 */

	// Get the current options from the database.
	// If none are specified, use these defaults.
	function np011_get_theme_options() {
		$saved = (array) get_option( 'np011_theme_options' );
		$defaults = array(
			'sample_checkbox'       => 'off',
			'sample_text_input'     => '',
			'sample_select_options' => '',
			'sample_radio_buttons'  => '',
			'sample_textarea'       => '',
		);

		$defaults = apply_filters( 'np011_default_theme_options', $defaults );

		$options = wp_parse_args( $saved, $defaults );
		$options = array_intersect_key( $options, $defaults );

		return $options;
	}

	// Sanitize and validate updated theme options
	function np011_theme_options_validate( $input ) {
		$output = array();

		// Checkboxes will only be present if checked.
		if ( isset( $input['sample_checkbox'] ) )
			$output['sample_checkbox'] = 'on';

		// The sample text input must be safe text with no HTML tags
		if ( isset( $input['sample_text_input'] ) && ! empty( $input['sample_text_input'] ) )
			$output['sample_text_input'] = wp_filter_nohtml_kses( $input['sample_text_input'] );

		// The sample select option must actually be in the array of select options
		if ( isset( $input['sample_select_options'] ) && array_key_exists( $input['sample_select_options'], np011_settings_field_sample_select_options_choices() ) )
			$output['sample_select_options'] = $input['sample_select_options'];

		// The sample radio button value must be in our array of radio button values
		if ( isset( $input['sample_radio_buttons'] ) && array_key_exists( $input['sample_radio_buttons'], np011_settings_field_sample_radio_buttons_choices() ) )
			$output['sample_radio_buttons'] = $input['sample_radio_buttons'];

		// The sample textarea must be safe text with the allowed tags for posts
		if ( isset( $input['sample_textarea'] ) && ! empty( $input['sample_textarea'] ) )
			$output['sample_textarea'] = wp_filter_post_kses( $input['sample_textarea'] );

		return apply_filters( 'np011_theme_options_validate', $output, $input );
	}



	/**
	 * Theme Options Menu
	 * Each option field requires its own add_settings_field function.
	 */

	// Create theme options menu
	// The content that's rendered on the menu page.
	function np011_theme_options_render_page() {
		?>
		<div class="wrap">
			<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
			<h2><?php printf( __( '%s Theme Options', 'np011' ), $theme_name ); ?></h2>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'np011_options' );
					do_settings_sections( 'theme_options' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	// Register the theme options page and its fields
	function np011_theme_options_init() {

		// Register a setting and its sanitization callback
		// register_setting( $option_group, $option_name, $sanitize_callback );
		// $option_group - A settings group name.
		// $option_name - The name of an option to sanitize and save.
		// $sanitize_callback - A callback function that sanitizes the option's value.
		register_setting( 'np011_options', 'np011_theme_options', 'np011_theme_options_validate' );


		// Register our settings field group
		// add_settings_section( $id, $title, $callback, $page );
		// $id - Unique identifier for the settings section
		// $title - Section title
		// $callback - // Section callback (we don't want anything)
		// $page - // Menu slug, used to uniquely identify the page. See np011_theme_options_add_page().
		add_settings_section( 'general', 'General Options',  '__return_false', 'theme_options' );
        add_settings_section( 'footer', 'Footer',  '__return_false', 'theme_options' );


		// Register our individual settings fields
		// add_settings_field( $id, $title, $callback, $page, $section );
		// $id - Unique identifier for the field.
		// $title - Setting field title.
		// $callback - Function that creates the field (from the Theme Option Fields section).
		// $page - The menu page on which to display this field.
		// $section - The section of the settings page in which to show the field.
		add_settings_field( 'sample_checkbox', __( 'Sample Checkbox', 'np011' ), 'np011_settings_field_sample_checkbox', 'theme_options', 'general' );
		add_settings_field( 'sample_text_input', __( 'Sample Text Input', 'np011' ), 'np011_settings_field_sample_text_input', 'theme_options', 'general' );
		add_settings_field( 'sample_select_options', __( 'Sample Select Options', 'np011' ), 'np011_settings_field_sample_select_options', 'theme_options', 'general' );
		add_settings_field( 'sample_radio_buttons', __( 'Sample Radio Buttons', 'np011' ), 'np011_settings_field_sample_radio_buttons', 'theme_options', 'general' );
		add_settings_field( 'sample_textarea', __( 'Sample Textarea', 'np011' ), 'np011_settings_field_sample_textarea', 'theme_options', 'general' );
	}
	add_action( 'admin_init', 'np011_theme_options_init' );

	// Add the theme options page to the admin menu
	// Use add_theme_page() to add under Appearance tab (default).
	// Use add_menu_page() to add as it's own tab.
	// Use add_submenu_page() to add to another tab.
	function np011_theme_options_add_page() {

		// add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		// $page_title - Name of page
		// $menu_title - Label in menu
		// $capability - Capability required
		// $menu_slug - Used to uniquely identify the page
		// $function - Function that renders the options page
		$theme_page = add_theme_page( __( 'Theme Options', 'np011' ), __( 'Np011 Options', 'np011' ), 'edit_theme_options', 'theme_options', 'np011_theme_options_render_page' );

		// $theme_page = add_menu_page( __( 'Theme Options', 'np011' ), __( 'Theme Options', 'np011' ), 'edit_theme_options', 'theme_options', 'np011_theme_options_render_page' );
		// $theme_page = add_submenu_page( 'tools.php', __( 'Theme Options', 'np011' ), __( 'Theme Options', 'np011' ), 'edit_theme_options', 'theme_options', 'np011_theme_options_render_page' );
	}
	add_action( 'admin_menu', 'np011_theme_options_add_page' );



	// Restrict access to the theme options page to admins
	function np011_option_page_capability( $capability ) {
		return 'edit_theme_options';
	}
	add_filter( 'option_page_capability_np011_options', 'np011_option_page_capability' );