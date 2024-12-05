<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id'); // Foreign key must match the type of `categories.id`
            $table->timestamps();
        
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('stories');
    }
};
