<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioItemsTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image_public_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_items');
    }
}