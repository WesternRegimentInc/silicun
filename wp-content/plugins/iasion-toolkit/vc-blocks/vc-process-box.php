<?php
vc_map(
 array(
    "name" => esc_html__( "Process Block", "iasion-themenow" ),
    "base" => "iasion_process",
    "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
    "category" => esc_html__("iasion", "iasion-themenow"),
    "params" => array(
           array(
            "type" => "textfield",
            "heading" => __("Process Title","iasion-themenow"),
            "param_name" => "title",
            "description" => __( "Give Process Title ", "iasion-themenow"),
           ),
            
           
            array(
            "type" => "textarea",
            "heading" => esc_html__("Process Description","iasion-themenow"),
            "param_name" => "desc",
            "std" => esc_html__( " ", "iasion-themenow" ),
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

    )
 )
);