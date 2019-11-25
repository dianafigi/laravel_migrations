<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandIdToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->unsignedBigInteger('brand_id');  //posso fzr $table->integer('categoria_id')->unsigned(); desde q em produts tenha tb o q ta comentado (e nos brands acho...)
          $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
//qd se faz algo tem smp de se 'desfazer' com o down, começando pela ultima acçao ate à mais antiga. É so comparar esta funçao com a outra
          $table->dropForeign(['brand_id']);
          $table->dropColumn(['brand_id']);
        });
    }
}
