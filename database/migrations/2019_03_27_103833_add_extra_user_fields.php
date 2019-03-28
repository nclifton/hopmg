<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraUserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('title')->after('id')->nullable(true);
            $table->string('first_name')->after('title')->nullable(true);
            $table->string('last_name')->after('first_name')->nullable(true);
            $table->string('mobile')->after('last_name')->nullable(true);
            $table->string('postcode')->after('mobile')->nullable(true);
            $table->date('date_of_birth')->after('postcode')->nullable(true);
            $table->boolean('guest')->after('date_of_birth')->nullable(true);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('mobile');
            $table->dropColumn('postcode');
            $table->dropColumn('date_of_birth');
            $table->string('name')->after('id');
        });
    }
}
