<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleclibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleclibs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_id')->nullable();
            $table->string('booknumber')->nullable();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->longText('content');
            $table->string('writer')->nullable();
            $table->integer('page')->nullable();
            $table->integer('read_cnt')->nullable();
            $table->integer('download_cnt')->nullable();
            $table->integer('public_year')->nullable();
            $table->string('publisher')->nullable();
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
        Schema::dropIfExists('eleclibs');
    }
}
