<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

vc_map(
    array(
        "name" => esc_html__( "Slides Item", "iasion-themenow" ),
        "base" => "iasion_slides",
        "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
        "category" => esc_html__( "iasion", "iasion-themenow"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Slides count", "iasion-themenow" ),
                "param_name" => "count",
                "std" => esc_html__( "3", "iasion-themenow" ),
                "value" => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    'Unlimited' => '-1',
                ),
                "description" => esc_html__( "How many slide you want to show?", "iasion-themenow" )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Select slide", "iasion-themenow" ),
                "param_name" => "slide_id",
                "value" => iasion_toolkit_get_slides_as_list(),
                "description" => esc_html__( "Select slide", "iasion-themenow" ),
                "dependency" => array(
                    "element" => "count",
                    "value" => array("1"),
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Autoplay?", "iasion-themenow" ),
                "param_name" => "autoplay",
                "std" => esc_html__( "true", "iasion-themenow" ),
                "value" => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                "description" => esc_html__( "If you want enable slides autoplay, select yes", "iasion-themenow" ),
                "dependency" => array(
                    "element" => "count",
                    "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "-1"),
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Slider Effect", "iasion-themenow" ),
                "param_name" => "effects",
                "std" => esc_html__( "turnOver", "iasion-themenow" ),
                "value" => array(
                    'none' => 'none', 
                    'fade' => 'fade', 
                    'slide' => 'slide', 
                    'kick' => 'kick', 
                    'transfer' => 'transfer', 
                    'shuffle' => 'shuffle', 
                    'explode' => 'explode',  
                    'chewyBars' => 'chewyBars'
                ),
                "description" => esc_html__( "If you want enable slides autoplay, select yes", "iasion-themenow" ),
                "dependency" => array(
                    "element" => "count",
                    "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "-1"),
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Autoplay time", "iasion-themenow" ),
                "param_name" => "autoplay_time",
                "std" => esc_html__( "5000", "iasion-themenow" ),
                "value" => array(
                    '1 Seconds' => '1000',
                    '2 Seconds' => '2000',
                    '3 Seconds' => '3000',
                    '4 Seconds' => '4000',
                    '5 Seconds' => '5000',
                    '6 Seconds' => '6000',
                    '7 Seconds' => '7000',
                    '8 Seconds' => '8000',
                    '9 Seconds' => '9000',
                    '10 Seconds' => '10000',
                ),
                "description" => esc_html__( "Select autoplay time..", "iasion-themenow" ),
                "dependency" => array(
                    "element" => "count",
                    "value" => array("2", "3", "4", "5", "6", "7", "8", "9", "-1"),
                )
            ),
        )
    )
);