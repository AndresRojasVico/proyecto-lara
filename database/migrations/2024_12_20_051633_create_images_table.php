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
        DB::statement("
        CREATE TABLE IF NOT EXISTS images  (
        id               int(255) auto_increment not null,
        user_id          int(255),
        image_path       varchar(255),
        description      text,
        created_at       datetime,
        updated_at       datetime,
        CONSTRAINT pk_images PRIMARY KEY(id),
        CONSTRAINT fk_images_user_id FOREIGN KEY(user_id) REFERENCES users(id)
        ) ENGINE=InnoDB ;
        ");
        /*
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
