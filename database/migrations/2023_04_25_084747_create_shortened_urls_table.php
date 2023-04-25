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
        self::down();

        Schema::create('shortened_urls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('original_url');
            $table->string('short_url');

            $table->unsignedInteger('users_id');
//            $table->foreign('users_id')->references('id')
//                ->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('shortened_urls');
    }
};
