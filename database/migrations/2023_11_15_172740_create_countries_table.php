<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id')->index('ctr_id');
            $table->string('code', 3)->default('')->unique('ctr_code')->index('ctr_code');           
            $table->string('name', 53)->index('ctr_name'); 
            $table->char('continent_code', 4)->index('ctr_continent_code');
            $table->string('background_image', 255)->nullable();
			$table->enum('active', ['0', '1'])->default('0');
            $table->foreign('continent_code')->references('code')->on('continents')->onDelete('no action');
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
        Schema::dropIfExists('countries');
    }
}
