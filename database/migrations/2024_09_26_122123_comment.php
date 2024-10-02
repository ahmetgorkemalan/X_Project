<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commentownerid')->constrained('user','id')->onDelete('cascade');
            $table->unsignedBigInteger('postid')->constrained('post','id')->onDelete('cascade');
            $table->text('commenttext');
            $table->timestamps();
            
            $table->foreign('postid')->references('id')->on('post')->onDelete('cascade');
            $table->foreign('commentownerid')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void{
        Schema::dropIfExists('comment');
    }
};
