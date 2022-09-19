<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name',30);
            $table->string('middle_name',30)->nullable();
            $table->string('last_name',20);
            $table->string('contact',15);
            $table->string('profile')->nullable();
            $table->string('cv')->nullable();
            $table->text('address');
            $table->foreignId('gender_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('dob');
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
        Schema::dropIfExists('profiles');
    }
}
