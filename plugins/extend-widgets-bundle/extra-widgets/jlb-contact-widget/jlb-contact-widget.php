<?php
/*
Widget Name: JLB Contact Widget
Description: This is for the Contact Widget module displayed on the Child Page Mockup.
Author:JLB (Josh Kincheloe)
*/
class JLB_Contact_Widget extends SiteOrigin_Widget {
  function get_template_name($instance) {
    return 'jlb-contact-widget-template';
  }
  function get_template_dir($instance) {
    return 'jlb-contact-widget-templates';
  }
  function initialize() {
    $this->register_frontend_styles(
      array(
        array( 'jlb-contact-widget-css', '/wp-content/plugins/extend-widgets-bundle/css/jlb-contact-widget.min.css', array() ),
      )
    );
    /*
    $this->register_frontend_scripts(
      array(
        array( 'jlb-contact-widget-js', '/wp-content/plugins/extend-widgets-bundle/js/jlb-contact-widget.js', array( 'jquery' ), '1.0')
      )
    );
    */
  }
  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
      // The unique id for your widget.
      'jlb-contact-widget',
      // The name of the widget for display purposes.
      __('JLB Contact Widget', 'jlb-contact-widget-text-domain'),
      // The widget_options array, which is passed through to WP_Widget.
      // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
      array(
        'description' => __('JLB Contact Widget', 'jlb-contact-widget-text-domain'),
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
            'type' => 'textarea',
            'label' => __( 'Type a message', 'widget-form-fields-text-domain' ),
            'default' => 'Content',
            'rows' => 10
        ),
    );
  }
}
siteorigin_widget_register('jlb-contact-widget', __FILE__, 'JLB_Contact_Widget');