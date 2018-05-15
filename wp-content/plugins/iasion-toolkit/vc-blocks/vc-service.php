<?php
vc_map(
 array(
    "name" => esc_html__( "Service Block", "iasion-themenow" ),
    "base" => "iasion_service",
    "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
    "category" => esc_html__("iasion", "iasion-themenow"),
    "params" => array(
           array(
            "type" => "textfield",
            "heading" => __("Service Title","iasion-themenow"),
            "param_name" => "title",
            "description" => __( "Give Service Title ", "iasion-themenow"),
           ),
            
           
            array(
            "type" => "textarea",
            "heading" => esc_html__("Service Description","iasion-themenow"),
            "param_name" => "desc",
            "std" => esc_html__( " ", "iasion-themenow" ),
            "description" => esc_html__( "", "iasion-themenow"),
            
           ),

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

            //icon or font awesome select

            array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Type","iasion-themenow"),
            "param_name" => "icon_type",
            "std" => esc_html__( "1", "iasion-themenow" ),
            "value" => array(
              'Upload' => 1,
              'FontAwesome' => 2,
            ),
            "description" => esc_html__( "", "iasion-themenow"),
            
           ),

            array(
            "type" => "attach_image",
            "heading" => esc_html__("Upload Icon","iasion-themenow"),
            "param_name" => "upload_icon",
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "icon_type",
            "value" => array("1"),
            )
            
           ),

            array(
            "type" => "iconpicker",
            "heading" => esc_html__("Choose Icon","iasion-themenow"),
            "param_name" => "choose_icon",
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "icon_type",
            "value" => array("2"),
            )
            
           ),

            array(
            "type"=>"attach_image",
            "heading"=>esc_html__("Upload background image","iasion-themenow"),
            "param_name" => "box_background",
            "description" => esc_html__( "", "iasion-themenow"),
            
               
                )


    )
 )
);