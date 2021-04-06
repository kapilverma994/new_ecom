<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('slug');
         
            $table->integer('brand_id');
            $table->string('name');
             $table->longText('short_desc');
            $table->longText('description');
            $table->longText('tech_spec');
            $table->longText('uses');
            $table->string('warranty');
            $table->unsignedTinyInteger('status')->default(1);
            $table->Text('keywords');
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
}
