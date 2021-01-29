<?php

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('catagory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name');
            $table->string('sku');
            $table->string('image');

            $table->decimal('cost_price',8,2);
            $table->decimal('retail_price',8,2);
            $table->string('year',4);
            $table->string('desc');
            $table->boolean('status')->default(Product::STATUS_ACTIVE);

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
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
