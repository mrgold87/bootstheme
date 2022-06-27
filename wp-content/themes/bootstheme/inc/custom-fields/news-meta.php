<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$text = __('Required field','BootSTheme');
Container::make('post_meta', 'Custom Data')
    ->where('post_type', '=', 'news')
    ->add_fields(array(
        Field::make('text', 'crb_title', __('Title','BootSTheme'))
            ->set_required(true)
            ->set_help_text($text),
        Field::make('rich_text', 'crb_text', __('Text for news','BootSTheme'))
            ->set_required(true)
            ->set_help_text($text),
        Field::make('image', 'crb_image', __('Image','BootSTheme'))
            ->set_required(true)
            ->set_help_text($text),
        Field::make('date_time', 'crb_create_date', 'Date news')
            ->set_storage_format('U')
            ->set_input_format('d.m.Y', 'd.m.Y')
            ->set_help_text($text),
    ));