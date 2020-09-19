<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_tag', function (Blueprint $table) {
            $table->id();//
            $table->timestamps();
            $table->foreignId('review_id')->constrained('reviews'); //foreignIdメソッドはunsignedBigIntegerのエイリアス
            $table->foreignId('tag_id')->constrained('tags'); //foreignIdメソッドはunsignedBigIntegerのエイリアス
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_tag');
    }
}
