<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'limits', function ( Blueprint $table )
        {
            $table->bigIncrements( 'id' );
            $table->string( 'subject', 512 );
            $table->string( 'package' )->nullable();
            $table->integer( 'allowed' );
            $table->enum( 'period', [ 'monthly', 'permanent' ] )->default( 'permanent' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'limits' );
    }
}
