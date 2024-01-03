<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->index('usr_id');	
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type',['Superadmin','Admin','Company','User','Partner','Content','Editor','Publisher','School','Student','Finance','Intelligence','Government','Developer'])->default('Member');
			$table->enum('active', ['0', '1','2'])->default('0');
			$table->enum('verified', ['0', '1'])->default('0');			
			$table->enum('blocked', ['0', '1'])->default('0');			
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
