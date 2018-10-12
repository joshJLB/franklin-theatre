<?php
/*
Widget Name: JLB Event Widget
Description: This is for the Event Widget module displayed on the Child Page Mockup.
Author:JLB (Josh Kincheloe)
*/
class JLB_Event_Widget extends SiteOrigin_Widget {
  function get_template_name($instance) {
    return 'jlb-event-widget-template';
  }
  function get_template_dir($instance) {
    return 'jlb-event-widget-templates';
  }
  function initialize() {
    $this->register_frontend_styles(
      array(
        array( 'jlb-event-widget-css', '/wp-content/plugins/extend-widgets-bundle/css/jlb-event-widget.min.css', array() ),
      )
    );
    
    $this->register_frontend_scripts(
      array(
        array( 'jlb-event-widget-js', '/wp-content/plugins/extend-widgets-bundle/js/jlb-event-widget.min.js', array( 'jquery' ), '1.0')
      )
    );
    
  }
  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
      // The unique id for your widget.
      'jlb-event-widget',
      // The name of the widget for display purposes.
      __('JLB Event Widget', 'jlb-event-widget-text-domain'),
      // The widget_options array, which is passed through to WP_Widget.
      // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
      array(
        'description' => __('JLB Event Widget', 'jlb-event-widget-text-domain'),
      ),
      //The base_folder path string.
      plugin_dir_path(__FILE__)
    );
  }
  function get_widget_form() {
    // https://siteorigin.com/docs/widgets-bundle/form-building/form-fields/
    return array(
      // put all fields here
      'categories' => array(
        'type' => 'repeater',
        'label' => __('Categories', 'widget-form-fields-text-domain'),
        'item_name' => __('Category', 'widget-form-fields-text-domain'),
        'fields' => array(
          'category' => array(
            'type' => 'text',
            'label' => __('Category', 'widget-form-fields-text-domain')
          ),
        )
      ),
    );
  }
}
siteorigin_widget_register('jlb-event-widget', __FILE__, 'JLB_Event_Widget');