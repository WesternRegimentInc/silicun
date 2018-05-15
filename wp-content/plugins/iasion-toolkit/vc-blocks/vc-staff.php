<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

vc_map(
    array(
        "name" => esc_html__( "Team Member", "iasion-themenow" ),
        "base" => "iasion_staff",
        "icon"  => IASION_ACC_URL.'/assets/img/iasion.png',
        "category" => esc_html__( "iasion", "iasion-themenow"),
        "params" => array(
            array(
                "type" => "attach_image",
                "heading" => esc_html__( "Photo", "iasion-themenow" ),
                "param_name" => "photo",
                "description" => esc_html__( "Upload staff photo..", "iasion-themenow" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "iasion-themenow" ),
                "param_name" => "title",
                "description" => esc_html__( "Type staff name or staff title", "iasion-themenow" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Designation", "iasion-themenow" ),
                "param_name" => "job",
                "description" => esc_html__( "Write staff designation", "iasion-themenow" )
            ),
            array(
                "type" => "param_group",
                "heading" => esc_html__( "Social Links", "iasion-themenow" ),
                "param_name" => "links",
                "params" => array(
                    array(
                        "type" => "iconpicker",
                        "heading" => esc_html__( "Select icon", "iasion-themenow" ),
                        "param_name" => "icon",
                        "description" => esc_html__( "Select an icon for staff social links", "iasion-themenow" )
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__( "Link", "iasion-themenow" ),
                        "param_name" => "link",
                        "value" => esc_html__( "http://", "iasion-themenow" ),
                        "description" => esc_html__( "Enter staff social profile link", "iasion-themenow" )
                    ),
                ),
                "description" => esc_html__( "Add stuff social link", "iasion-themenow" )
            ),

        )
    )
);