<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function ($table) {
            $table->integer( 'category_id' )->unsigned();
            $table->string( 'title' );
            $table->string('image');
            $table->double( 'original_price' );
            $table->double( 'discount_price' );
            $table->tinyInteger( 'in_stock' )->default( 1 );
            $table->tinyInteger( 'status' )->default( 0 );
            $table->softDeletes();

            $table->foreign( 'category_id' )
                ->references( 'id' )->on( 'categories' )
                ->onDelete( 'cascade' )
                ->onUpdate( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
