<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the post
            $table->text('content'); // Content of the post
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for user
            $table->timestamps(); // Created at and updated at timestamps
        });

    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
