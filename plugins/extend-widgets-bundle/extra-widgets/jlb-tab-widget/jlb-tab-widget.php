<?php

/*
Widget Name: JLB Tab Widget
Description: This is for the 3 tab module displayed on the Child Page Mockup.
Author:JLB (Bill Goff)
*/

class JLB_Tab_Widget extends SiteOrigin_Widget {

  function get_template_name($instance) {
      return 'jlb-tab-template';
  }

  function get_template_dir($instance) {
      return 'jlb-tab-template';
  }

  function initialize() {
      $this->register_frontend_styles(
          array(
              array( 'jlb-tab-css', '/wp-content/plugins/extend-widgets-bundle/css/jlb-tab-widget.min.css', array() )
          )
      );
  }
    function __construct() {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
            // The unique id for your widget.
            'jlb-tab-widget',

            // The name of the widget for display purposes.
            __('JLB Tabs', 'jlb-tab-widget-text-domain'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('JLB Tabs.', 'jlb-tab-widget-text-domain'),
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            $form_options = array(
                'a_repeater' => array(
                    'type' => 'repeater',
                    'label' => __( 'Tabs' , 'widget-form-fields-text-domain' ),
                    'item_name'  => __( 'Tab', 'siteorigin-widgets' ),
                    'fields' => array(
                        'repeat_text' => array(
                            'type' => 'text',
                            'label' => __( 'Tab Title', 'widget-form-fields-text-domain' )
                        ),
                    )
                )
            ),



            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }


}

siteorigin_widget_register('jlb-tab-widget', __FILE__, 'JLB_Tab_Widget');




?>
