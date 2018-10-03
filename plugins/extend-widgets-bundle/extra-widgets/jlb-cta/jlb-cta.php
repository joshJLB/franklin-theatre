<?php
/*
Widget Name: JLB CTA
Description: This is for the CTA module displayed on the Child Page Mockup.
Author:JLB (Josh Kincheloe)
*/
class JLB_CTA extends SiteOrigin_Widget {
  function get_template_name($instance) {
    return 'jlb-cta-template';
  }
  function get_template_dir($instance) {
    return 'jlb-cta-templates';
  }
  function initialize() {
    $this->register_frontend_styles(
      array(
        array( 'jlb-cta-css', '/wp-content/plugins/extend-widgets-bundle/css/jlb-cta.min.css', array() ),
      )
    );
    /*
    $this->register_frontend_scripts(
      array(
        array( 'jlb-cta-js', '/wp-content/plugins/extend-widgets-bundle/js/jlb-cta.js', array( 'jquery' ), '1.0')
      )
    );
    */
  }
  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
      // The unique id for your widget.
      'jlb-cta',
      // The name of the widget for display purposes.
      __('JLB CTA', 'jlb-cta-text-domain'),
      // The widget_options array, which is passed through to WP_Widget.
      // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
      array(
        'description' => __('JLB CTA', 'jlb-cta-text-domain'),
      ),
      //The base_folder path string.
      plugin_dir_path(__FILE__)
    );
  }
  function get_widget_form() {
    // https://siteorigin.com/docs/widgets-bundle/form-building/form-fields/
    return array(
      // put all fields here
        'image' => array(
          'type' => 'media',
          'label' => __('Choose an Image', 'widget-form-fields-text-domain'),
          'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
          'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
          'library' => 'image',
        ),
        'title_left' => array(
          'type' => 'text',
          'label' => __('Title Left', 'widget-form-fields-text-domain')
        ),
        'title_right' => array(
          'type' => 'text',
          'label' => __('Title Right', 'widget-form-fields-text-domain')
        ),
        'content' => array(
            'type' => 'textarea',
            'label' => __( 'Type a message', 'widget-form-fields-text-domain' ),
            'default' => 'Content',
            'rows' => 10
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
siteorigin_widget_register('jlb-cta', __FILE__, 'JLB_CTA');