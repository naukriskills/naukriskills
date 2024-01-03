<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->index('ctg_id');
            $table->integer('userid')->nullable();
            $table->string('code')->nullable();
            $table->string('name', 191)->default('')->index('ctg_name');			
            $table->string('description', 191)->default('');				
            $table->string('picture', 191)->nullable();
            $table->string('css_class', 191)->nullable();			
			$table->enum('status', ['0', '1'])->default('0');			
            $table->softDeletes();			
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
        Schema::dropIfExists('categories');
    }
}
