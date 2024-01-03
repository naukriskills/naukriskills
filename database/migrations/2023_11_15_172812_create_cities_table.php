<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigInteger('id')->unique('cty_id')->unsigned()->index('cty_id')->primary();
            $table->string('country_code', 3)->index('cty_country_code');
            $table->string('name', 53)->index('cty_name');           
            $table->float('latitude', 10, 0)->nullable();
            $table->float('longitude', 10, 0)->nullable();                 
			$table->enum('active', ['0', '1'])->default('0');
            $table->foreign('country_code')->references('code')->on('countries')->onDelete('no action');
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
        Schema::dropIfExists('cities');
    }
}
