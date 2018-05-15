<?php
 
vc_map( array(
    "name" => esc_html__( "google map", "iasion-themenow" ),
    "base" => "iasion_google_map",
    "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
    "category" => esc_html__( "iasion", "iasion-themenow"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Latitude", "iasion-themenow" ),
            "param_name" => "lat",
            "value" => esc_html__( "23.777176", "iasion-themenow" ),
            "description" => esc_html__( "Give [six digit after point] latitude.", "iasion-themenow" )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Longitude", "iasion-themenow" ),
            "param_name" => "lng",
            "value" => esc_html__( "90.399452", "iasion-themenow" ),
            "description" => esc_html__( "Give [six digit after point] longitude", "iasion-themenow" )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Map zoom", "iasion-themenow" ),
            "param_name" => "zoom",
            "value" => esc_html__( "14", "iasion-themenow" ),
            "description" => esc_html__( "Give map zoom number. default is 14", "iasion-themenow" )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__( "Enable scroll?", "iasion-themenow" ),
            "param_name" => "scroll",
            "std" => 'false',
            "value" => array(
                'false' => 'false',
                'true' => 'true',
            ),
            "description" => esc_html__( "false for disable mouse scroll and true for enable.", "iasion-themenow" )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Location title", "iasion-themenow" ),
            "param_name" => "title",
            "value" => esc_html__( "", "iasion-themenow" ),
            "description" => esc_html__( "Type your location title", "iasion-themenow" )
        ),
       
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Map height", "iasion-themenow" ),
            "param_name" => "height",
            "value" => esc_html__( "400", "iasion-themenow" ),
            "description" => esc_html__( "Type your map height", "iasion-themenow" )
        ),
 
    )
) );