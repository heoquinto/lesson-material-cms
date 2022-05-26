<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('rank_id')->nullable();
            $table->integer('lesson_id')->nullable();
            $table->string('title');
            $table->string('url');
            $table->longText('content')->nullable();
            $table->longText('css')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
