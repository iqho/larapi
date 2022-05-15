<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned()->nullable();

            $table->string('name', 100);
            $table->string('slug', 100)->unique();;
            $table->text('description')->nullable();
            $table->string('image', 100)->nullable();

            $table->boolean('is_active')->default(true);

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('admins')->onUpdate('cascade')
            ->onDelete('restrict');

            $table->unique(['category_id', 'name'], 'unique_identifier');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
