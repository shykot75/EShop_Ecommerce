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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_ban');
            $table->string('product_slug_en');
            $table->string('product_slug_ban');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->string('product_tags_en');
            $table->string('product_tags_ban');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_ban')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_ban');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('short_desc_en');
            $table->text('short_desc_ban');
            $table->longText('long_desc_en')->nullable();
            $table->longText('long_desc_ban')->nullable();
            $table->text('product_thumbnail');
            $table->tinyInteger('hot_deals')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->tinyInteger('special_offer')->nullable();
            $table->tinyInteger('special_deals')->nullable();
            $table->tinyInteger('status')->default('0');

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
};
