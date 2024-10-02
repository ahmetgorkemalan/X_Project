<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ownerid')->constrained('user','id')->onDelete('cascade');
            $table->text('posttext');
            $table->timestamps();

            $table->foreign('ownerid')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void{
        Schema::dropIfExists('post');
    }
};