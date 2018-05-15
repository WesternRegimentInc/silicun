<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
vc_map(
    array(
        "name" => esc_html__( "Call to action", "iasion-themenow" ),
        "base" => "iasion_cta",
        "category" => esc_html__( "iasion", "iasion-themenow"),
        "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "iasion-themenow" ),
                "param_name" => "title",
                "description" => esc_html__( "Type your CTA title", "iasion-themenow" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Description", "iasion-themenow" ),
                "param_name" => "desc",
                "description" => esc_html__( "Type your CTA Description", "iasion-themenow" )
            ),
             

            array(
                "type" => "textfield",
                "heading" => esc_html__( "Link text", "iasion-themenow" ),
                "param_name" => "link_text",
                "description" => esc_html__( "Type link text", "iasion-themenow" )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Link to", "iasion-themenow" ),
                "param_name" => "link_to",
                "std" => esc_html__( "1", "iasion-themenow" ),
                "value" => array(
                    esc_html__('Page', 'iasion-themenow') => '1',
                    esc_html__('External link', 'iasion-themenow') => '2',
                ),
                "description" => esc_html__( "Select your link type enternal or external", "iasion-themenow" )
            ),

            

            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Select page", "iasion-themenow" ),
                "param_name" => "link_to_page",
                "value" => iasion_toolkit_get_page_as_list(),
                "description" => esc_html__( "Select enternal link page", "iasion-themenow" ),
                "dependency" => array(
                    "element" => "link_to",
                    "value" => array("1"),
                )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Link", "iasion-themenow" ),
                "param_name" => "link_external",
                "description" => esc_html__( "Type external link here", "iasion-themenow" ),
                "dependency" => array(
                    "element" => "link_to",
                    "value" => array("2"),
                )
            ),
        )
    )
);