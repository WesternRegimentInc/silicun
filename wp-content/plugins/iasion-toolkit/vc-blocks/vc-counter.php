<?php
vc_map(
 array(
    "name" => esc_html__( "Counter Item", "iasion-themenow" ),
    "base" => "iasion_counter",
    "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
    "category" => esc_html__("iasion", "iasion-themenow"),
    "params" => array(
           

            array(
            "type" => "textfield",
            "heading" => esc_html__("Statistics number","iasion-themenow"),
            "param_name" => "number", 
            "description" => esc_html__( "", "iasion-themenow"),

           ),

            array(
            "type" => "textfield",
            "heading" => esc_html__("Statistics After Text","iasion-themenow"),
            "param_name" => "after_text",
            "std" => esc_html__( "", "iasion-themenow" ),
            "description" => esc_html__( "if want to use +, after number", "iasion-themenow"),
            
           ),

             array(
            "type" => "textfield",
            "heading" => esc_html__("Statistics Description","iasion-themenow"),
            "param_name" => "desc",
            "std" => esc_html__( "", "iasion-themenow" ),
            "description" => esc_html__( "", "iasion-themenow"),
            
           ),

    )
 )
);