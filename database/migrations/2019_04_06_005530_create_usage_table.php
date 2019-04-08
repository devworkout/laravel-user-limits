<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'limit_usage', function ( Blueprint $table )
        {
            $table->bigIncrements( 'id' );
            $table->unsignedInteger( 'user_id' );
            $table->unsignedInteger( 'limit_id' );
            $table->unsignedInteger( 'used' )->default( 0 );
            $table->timestamp( 'refreshed_at' )->useCurrent();
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
        Schema::dropIfExists( 'limit_usage' );
    }
}
