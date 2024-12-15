<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appearance_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_admin_id')
                  ->constrained('user_admins')
                  ->onDelete('cascade');
            
            $table->string('primary_color')->default('#0075FF');
            $table->string('primary_gradient_start')->default('#4318FF');
            $table->string('primary_gradient_end')->default('#9F7AEA');

            $table->string('sidebar_bg_start')->default('#060B26');
            $table->string('sidebar_bg_mid')->default('#070C27');
            $table->string('sidebar_bg_end')->default('#1A1F37');
            $table->string('sidebar_text_color')->default('#FFFFFF');
            $table->string('sidebar_menu_icon_bg')->default('#1A1F37');
            $table->string('sidebar_menu_icon_hover')->default('#0075FF');
            $table->string('sidebar_line_color')->default('#E0E1E2');
            $table->string('sidebar_menu_hover_bg')->default('#1A1F37');

            $table->string('header_bg_start')->default('#060B26');
            $table->string('header_bg_mid')->default('#070C27');
            $table->string('header_bg_end')->default('#1A1F37');
            $table->string('header_text_color')->default('#FFFFFF');
            $table->string('header_text_muted')->default('#FFFFFF80');
            $table->string('header_icon_hover')->default('#FFFFFF1A');

            $table->string('body_bg_overlay')->default('#060B26');
            $table->string('content_bg_dark')->default('#060B26');
            $table->string('content_bg_light')->default('#1A1F37');

            $table->string('card_bg_dark')->default('#060B26');
            $table->string('card_bg_light')->default('#1A1F37');
            $table->string('card_border')->default('#FFFFFF1A');
            $table->string('card_text')->default('#FFFFFF');
            $table->string('card_text_muted')->default('#FFFFFF80');

            $table->string('input_bg')->default('#060B26');
            $table->string('input_border')->default('#FFFFFF1A');
            $table->string('input_text')->default('#FFFFFF');
            $table->string('input_placeholder')->default('#FFFFFF80');

            $table->string('danger_bg')->default('#DC3545');
            $table->string('danger_border')->default('#DC3545');
            $table->string('danger_text')->default('#DC3545');

            $table->integer('content_blur')->default(10); // For backdrop-filter: blur()
                  
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appearance_settings');
    }
}; 