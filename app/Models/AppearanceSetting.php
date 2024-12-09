<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppearanceSetting extends Model
{
    protected $fillable = [
        'user_admin_id',
        'primary_color',
        'primary_gradient_start',
        'primary_gradient_end',
        'sidebar_bg_start',
        'sidebar_bg_mid',
        'sidebar_bg_end',
        'sidebar_text_color',
        'sidebar_menu_icon_bg',
        'sidebar_menu_icon_hover',
        'sidebar_line_color',
        'sidebar_menu_hover_bg',
        'header_bg_start',
        'header_bg_mid',
        'header_bg_end',
        'header_text_color',
        'header_text_muted',
        'header_icon_hover',
        'body_bg_overlay',
        'content_bg_dark',
        'content_bg_light',
        'content_blur',
        'card_bg_dark',
        'card_bg_light',
        'card_border',
        'card_text',
        'card_text_muted',
        'input_bg',
        'input_border',
        'input_text',
        'input_placeholder',
    ];

    public function userAdmin()
    {
        return $this->belongsTo(UserAdmin::class);
    }
} 