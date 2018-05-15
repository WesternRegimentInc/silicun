<?php
vc_map(
 array(
    "name" => esc_html__( "Testimonial", "iasion-themenow" ),
    "base" => "iasion_testimonial",
    "icon"  => IASION_ACC_URL.'/assets/img/iasion.png', 
    "category" => esc_html__("iasion", "iasion-themenow"),
    "params" => array( 
           array(
            "type" => "textfield",
            "heading" => esc_html__("Count","iasion-themenow"),
            "param_name" => "count", 
            "value" => esc_html__( "3", "iasion-themenow" ),
            "description" => esc_html__( "Select testimonial count.", "iasion-themenow"),
           ),
            array(
            "type" => "dropdown",
            "heading" => esc_html__("Select slide","iasion-themenow"),
            "param_name" => "testimonial_id",
            "value" => iasion_toolkit_get_testimonial_as_list(),
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(  
             "element" => "count",  
             "value" => array("1"),
            )
           ),
            
            array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable loop?","iasion-themenow"),
            "param_name" => "loop",
            "std" => esc_html__( "true", "iasion-themenow" ),
            "value" => array(
              'Yes' => 'true',
              'No' => 'false',
            ),
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "count",
            "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"),
            )
           ),
           array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable autoplay?","iasion-themenow"),
            "param_name" => "autoplay",
            "std" => esc_html__( "true", "iasion-themenow" ),
            "value" => array(
              'Yes' => 'true',
              'No' => 'false',
            ),
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "count",
            "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"),
            )
           ),
           array(
            "type" => "dropdown",
            "heading" => esc_html__("Slide time","iasion-themenow"),
            "param_name" => "autoplayTimeout",
            "std" => esc_html__( "5000", "iasion-themenow" ),
            "value" => array(
              '1 Second' => '1000',
              '2 Seconds' => '2000',
              '3 Seconds' => '3000',
              '4 Seconds' => '4000',
              '5 Seconds' => '5000',
              '6 Seconds' => '6000',
              '7 Seconds' => '7000',
              '8 Seconds' => '8000',
              '9 Seconds' => '9000',
              '10 Seconds' => '10000',
              '11 Seconds' => '11000',
              '12 Seconds' => '12000',
              '13 Seconds' => '13000',
              '14 Seconds' => '14000',
              '15 Seconds' => '15000',
            ),
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "count",
            "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"),
            )
           ),

           
           
           array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable dots?","iasion-themenow"),
            "param_name" => "dots",
            "std" => esc_html__( "true", "iasion-themenow" ),
            "value" => array(
              'Yes' => 'true',
              'No' => 'false',
            ),
            "description" => esc_html__( "", "iasion-themenow"),
            "dependency" => array(
            "element" => "count",
            "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"),
            )
           )
    )
 )
);