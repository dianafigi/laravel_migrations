<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_department', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id'); //uma chave estrangeira
            $table->unsignedBigInteger('department_id');  //uma chave estrangeira
            //criar dois relacionamentos de chave estrangeira
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); //onDelete('cascade') é para se na tabela produtos, um produto for apagado, a relaçao com esta tabela é tb eliminada
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            //crio chave primaria com base nos dois campos estrangeiros
            $table->primary(['product_id', 'department_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_department');
    }
}
