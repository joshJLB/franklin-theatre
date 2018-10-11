<?php
/*
Widget Name: JLB Single Event
Description: This is for the Single Event module displayed on the Child Page Mockup.
Author:JLB (Josh Kincheloe)
*/
class JLB_Single_Event extends SiteOrigin_Widget {
  function get_template_name($instance) {
    return 'jlb-single-event-template';
  }
  function get_template_dir($instance) {
    return 'jlb-single-event-templates';
  }
  function initialize() {
    $this->register_frontend_styles(
      array(
        array( 'jlb-single-event-css', '/wp-content/plugins/extend-widgets-bundle/css/jlb-single-event.min.css', array() ),
      )
    );
    /*
    $this->register_frontend_scripts(
      array(
        array( 'jlb-single-event-js', '/wp-content/plugins/extend-widgets-bundle/js/jlb-single-event.js', array( 'jquery' ), '1.0')
      )
    );
    */
  }
  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
      // The unique id for your widget.
      'jlb-single-event',
      // The name of the widget for display purposes.
      __('JLB Single Event', 'jlb-single-event-text-domain'),
      // The widget_options array, which is passed through to WP_Widget.
      // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
      array(
        'description' => __('JLB Single Event', 'jlb-single-event-text-domain'),
      ),
      //The base_folder path string.
      plugin_dir_path(__FILE__)
    );
  }
  function get_widget_form() {
    // https://siteorigin.com/docs/widgets-bundle/form-building/form-fields/
    return array(
      // put all fields here
        'show_id' => array(
            'type' => 'number',
            'label' => __( 'Enter Show ID', 'widget-form-fields-text-domain' ),
            'default' => '12654'
        ),
    );
  }
}
siteorigin_widget_register('jlb-single-event', __FILE__, 'JLB_Single_Event');