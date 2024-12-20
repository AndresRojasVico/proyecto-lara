<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        */
        DB::statement("
        CREATE TABLE IF NOT EXISTS likes (
        id               int(255) auto_increment not null,
        user_id          int(255),
        image_id         int(255),
        created_at       datetime,
        updated_at       datetime,
            CONSTRAINT pk_likes PRIMARY KEY(id),
            CONSTRAINT fk_likes_user_id FOREIGN KEY(user_id) REFERENCES users(id),
            CONSTRAINT fk_likes_image_id FOREIGN KEY(image_id) REFERENCES images(id)
        ) ENGINE=InnoDB ;

");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
