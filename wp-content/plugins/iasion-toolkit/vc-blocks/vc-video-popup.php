<?php
 
// Modal Youtube Video Addon
 
 
   vc_map( array(
      "name"     => esc_html__( "Video Popup", "iasion-themenow" ),
      "base"     => "iasion_modal_youtube",
      "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
      "category" => esc_html__( "iasion", "iasion-themenow"),
      "show_settings_on_create" => true,
      'js_view'                 => '',
      "description" => '',
      "params"   => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Video ID", "iasion-themenow" ),
            "param_name" => "id",
            "value"   => "6Rc8NBSAPfI",
            "description" => esc_html__( "For example https://www.youtube.com/watch?v=6Rc8NBSAPfI (Use video id after watch?v=)","iasion-themenow" ),
         ),
         
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Video width", "iasion-themenow" ),
            "param_name" => "width",
            "description" => esc_html__( "Set Video Width(Optional) in number. no string.", "iasion-themenow" )
         ),
         
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Do You want Pop Up Video?", "iasion-themenow" ),
            "param_name" => "modal",
            "value" => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
         ),
         
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Video Title", "iasion-themenow" ),
            "param_name" => "title",
            "value" => "",
            "dependency" => array(
                'element' => 'modal',
                'value'   => 'true',
            ),
         ),
         
        array(
            "type"       => "attach_image",
            "heading"    => esc_html__("Upload Modal image","iasion-themenow"),
            "param_name" => "imge",
            "dependency" => array(
                'element' => "modal",
                'value' => 'true'
            ),
        ),
         
         
 
         
         
      )
       
   )
);