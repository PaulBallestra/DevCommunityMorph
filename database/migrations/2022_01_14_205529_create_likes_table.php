<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{

    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->morphs('likeable');

        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
