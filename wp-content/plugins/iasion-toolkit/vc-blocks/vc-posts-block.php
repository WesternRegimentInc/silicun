<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
vc_map(
    array(
        "name" => esc_html__( "Posts block", "iasion-themenow" ),
        "base" => "iasion_post_block",
        "category" => esc_html__( "iasion", "iasion-themenow"),
        "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Columns", "iasion-themenow" ),
                "param_name" => "columns",
                "std" => esc_html__( "4", "iasion-themenow" ),
                "value" => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '6' => '6',
                ),
                "description" => esc_html__( "Select post column", "iasion-themenow" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Posts count", "iasion-themenow" ),
                "param_name" => "count",
                "std" => esc_html__( "4", "iasion-themenow" ),
                "description" => esc_html__( "How many posts you want to show? Type -1 for unlimited posts.", "iasion-themenow" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Read more link text", "iasion-themenow" ),
                "param_name" => "readmore_text",
                "std" => esc_html__('Read more', 'iasion-themenow'),
                "description" => esc_html__( "Type link text here", "iasion-themenow" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Select category", "iasion-themenow" ),
                "param_name" => "category_id",
                "value" => iasion_toolkit_get_post_taxonomies_as_list(),
                "description" => esc_html__( "Select post category", "iasion-themenow" ),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Show post date?", "iasion-themenow" ),
                "param_name" => "date",
                "std" => esc_html__( "1", "iasion-themenow" ),
                "value" => array(
                    esc_html__('Yes', 'iasion-themenow') => '1',
                    esc_html__('No', 'iasion-themenow') => '2',
                ),
                "description" => esc_html__( "Show or hide post date", "iasion-themenow" ),
            ),
        )
    )
);