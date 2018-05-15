<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => esc_html__( "Section title", "iasion-themenow" ),
        "base" => "iasion_section_title",
        "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
        "category" => __( "iasion", "iasion-themenow"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "iasion-themenow" ),
                "param_name" => "title",
                "description" => esc_html__( "Type section title..", "iasion-themenow" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Top Title", "iasion-themenow" ),
                "param_name" => "top_title",
                "description" => esc_html__( "write about section top title", "iasion-themenow" )
            ),
            
           
        )
    )
);