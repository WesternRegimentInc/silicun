<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => esc_html__( "Projects", "iasion-themenow" ),
        "base" => "iasion_projects",
        "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
        "category" => esc_html__( "iasion", "iasion-themenow"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Projects count", "iasion-themenow" ),
                "param_name" => "count",
                "std" => esc_html__( "6", "iasion-themenow" ),
                "value" => array(
                    esc_html__('Unlimited', 'iasion-themenow') => '-1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',

                ),
                "description" => esc_html__( "How many projects you want to show?", "iasion-themenow" )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Projects columns", "iasion-themenow" ),
                "param_name" => "columns",
                "std" => esc_html__( "3", "iasion-themenow" ),
                "value" => array(
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ),
                "description" => esc_html__( "How many column do u want to use on portfolio?", "iasion-themenow" )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Enable Gutter between blocks?", "iasion-themenow" ),
                "param_name" => "gutter",
                "std" => __( "2", "iasion-themenow" ),
                "value" => array(
                    esc_html__('No', 'iasion-themenow') => '1',
                    esc_html__('Yes', 'iasion-themenow') => '2',
                ),
                "description" => esc_html__( "If you want to enable spaces between blocks, select yes.", "iasion-themenow" )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Projects category", "iasion-themenow" ),
                "param_name" => "category",
                "value" => iasion_toolkit_projectcat_as_list(),
                "description" => esc_html__( "Select project category", "iasion-themenow" )
            ),
           
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Enable filter?", "iasion-themenow" ),
                "param_name" => "filter",
                "std" => __( "2", "iasion-themenow" ),
                "value" => array(
                    esc_html__('No', 'iasion-themenow') => '1',
                    esc_html__('Yes', 'iasion-themenow') => '2',
                ),
                "description" => esc_html__( "If you want to enable project filter, select yes.", "iasion-themenow" )
            ),
            
        )
    )
);