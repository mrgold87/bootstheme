<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$text = __('Required field','BootSTheme');
Container::make('post_meta', 'Custom Data')
    ->where('post_type', '=', 'product')
    ->add_fields(array(
        Field::make('text', 'crb_name', __('Name','BootSTheme'))
            ->set_required(true)
            ->set_help_text($text),
        Field::make('rich_text', 'crb_description', __('Product description','BootSTheme'))
            ->set_required(true)
            ->set_help_text($text),
        Field::make( 'media_gallery', 'crb_media_gallery', __('Gallery','BootSTheme'))
            ->set_type( 'image')
            ->set_duplicates_allowed( false )
            ->set_required(true)
            ->set_help_text($text),
        Field::make('text', 'crb_equipment', __('Equipment','BootSTheme'))
            ->set_required(true)
            ->set_help_text($text),
        Field::make( 'select', 'crb_manufacturer', __( 'Manufacturer','BootSTheme' ) )
            ->set_required(true)
            ->set_help_text($text)
            ->set_options( array(
                '' => __( 'Choose' ),
                'Apple' => 'Apple',
                'Google' => 'Google',
                'Xiaomi' => 'Xiaomi',
            ) ),
         Field::make('text', 'crb_price', __('Price','BootSTheme'))
             ->set_required(true)
             ->set_help_text($text),
    ));