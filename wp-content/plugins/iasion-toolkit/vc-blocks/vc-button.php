<?php
vc_map(
 array(
    "name" => esc_html__( "Custom Button", "iasion-themenow" ),
    "base" => "iasion_btn",
    "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
    "category" => esc_html__("iasion", "iasion-themenow"),
    "params" => array(
           

            array(
            "type" => "dropdown",
            "heading" => esc_html__("Link Type","iasion-themenow"),
            "param_name" => "type",
            "std" => esc_html__( "1", "iasion-themenow" ),
            "value" => array(
              'link to page' => 1,   // link to WP page
              'External Link' => 2,
            ),
            "description" => esc_html__( "", "iasion-themenow"),
            
           ),

            array(
            "type" => "dropdown",
            "heading" => esc_html__("Link to page","iasion-themenow"),
            "param_name" => "link_to_page",
            "value" => iasion_toolkit_get_page_as_list(), 
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "type",
            "value" => array("1"),
            )
            
           ),

            array(
            "type" => "textfield",
            "heading" => esc_html__("External Link","iasion-themenow"),
            "param_name" => "external_link", 
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "type",
            "value" => array("2"),
            )
            
           ),
             
            //see more button

            array(
            "type" => "textfield",
            "heading" => esc_html__("Link text","iasion-themenow"),
            "param_name" => "link_text",
            "std" => esc_html__( "see more", "iasion-themenow" ),
            "description" => esc_html__( "", "iasion-themenow"),
            
           ),

    )
 )
);