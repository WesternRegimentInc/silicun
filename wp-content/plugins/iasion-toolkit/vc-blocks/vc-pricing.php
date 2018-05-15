<?php
 
// Pricing Box Addon
 
   vc_map( array(
      "name" => esc_html__( "Pricing Box", "iasion-themenow" ),
      "base" => "iasion_pricing",
      "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
      "category" => esc_html__( "iasion", "iasion-themenow"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Title", "iasion-themenow" ),
            "param_name" => "title",
            "description" => esc_html__( "Give Title.", "iasion-themenow" )
         ),
         
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Price", "iasion-themenow" ),
            "param_name" => "price",
            "description" => esc_html__( "Set price.", "iasion-themenow" )
         ),

         array(
            "type" => "textfield",
            "heading" => esc_html__( "Plan Duration", "iasion-themenow" ),
            "param_name" => "duration",
            "description" => esc_html__( "Set Duration. e.g: Month,Year. ", "iasion-themenow" )
         ),
         
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Currency", "iasion-themenow" ),
            "param_name" => "currency",
            "description" => esc_html__( "Set currency.", "iasion-themenow" )
         ),
         
         array(
                "type" => "textarea_html",
                "heading" => esc_html__( "Give features list", "iasion-themenow" ),
                "param_name" => "content",
                "description" => esc_html__( "Give Description.", "iasion-themenow" )
             ),
         
         array(
                "type" => "textfield",
                "heading" => esc_html__( "Button link", "iasion-themenow" ),
                "param_name" => "btn_link",
                "description" => esc_html__( "insert Link", "iasion-themenow" ),
             ),
             
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Link text", "iasion-themenow" ),
                "param_name" => "btn_text",
                "std" => esc_html__( "Purchase", "iasion-themenow" ),
                "description" => esc_html__( "Type button text.", "iasion-themenow" )
             ),
 
         
         
      )
       
   )
);