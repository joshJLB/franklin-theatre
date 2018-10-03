<?php
/*
Widget Name: JLB Centered Text Treatment
Description: This is for the Centered Text Treatment module displayed on the Child Page Mockup.
Author:JLB (Josh Kincheloe)
*/
class JLB_Centered_Text_Treatment extends SiteOrigin_Widget {
  function get_template_name($instance) {
    return 'jlb-centered-text-treatment-template';
  }
  function get_template_dir($instance) {
    return 'jlb-centered-text-treatment-templates';
  }
  function initialize() {
    $this->register_frontend_styles(
      array(
        array( 'jlb-centered-text-treatment-css', '/wp-content/plugins/extend-widgets-bundle/css/jlb-centered-text-treatment.min.css', array() ),
      )
    );
    /*
    $this->register_frontend_scripts(
      array(
        array( 'jlb-centered-text-treatment-js', '/wp-content/plugins/extend-widgets-bundle/js/jlb-centered-text-treatment.js', array( 'jquery' ), '1.0')
      )
    );
    */
  }
  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
      // The unique id for your widget.
      'jlb-centered-text-treatment',
      // The name of the widget for display purposes.
      __('JLB Centered Text Treatment', 'jlb-centered-text-treatment-text-domain'),
      // The widget_options array, which is passed through to WP_Widget.
      // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
      array(
        'description' => __('JLB Centered Text Treatment', 'jlb-centered-text-treatment-text-domain'),
      ),
      //The base_folder path string.
      plugin_dir_path(__FILE__)
    );
  }
  function get_widget_form() {
    // https://siteorigin.com/docs/widgets-bundle/form-building/form-fields/
    return array(
      // put all fields here
        'title' => array(
          'type' => 'text',
          'label' => __('Title', 'widget-form-fields-text-domain')
        ),
        'content' => array(
          'type' => 'tinymce',
          'label' => __('Content', 'widget-form-fields-text-domain'),
          'default_editor' => 'tmce'
        ),
        'link_text' => array(
          'type' => 'text',
          'label' => __('Link Text', 'widget-form-fields-text-domain')
        ),
        'link_url' => array(
            'type' => 'link',
            'label' => __('Link URL', 'widget-form-fields-text-domain'),
            'default' => 'http://www.example.com'
        ),
    );
  }
}
siteorigin_widget_register('jlb-centered-text-treatment', __FILE__, 'JLB_Centered_Text_Treatment');