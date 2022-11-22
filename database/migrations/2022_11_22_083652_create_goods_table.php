<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('goods_name');
            $table->double("goods_price");
            $table->string('tags')->nullable();
            $table->integer('views');
            $table->integer('goods__firm');
            $table->integer('goods__category');
            $table->integer('goods__count');
            $table->integer('color')->nullable();
            $table->double('cashdicount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
};
