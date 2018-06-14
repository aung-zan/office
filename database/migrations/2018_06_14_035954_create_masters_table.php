<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table ->bigIncrements('id');
            $table ->bigInteger('companies_id') ->unsigned();
            $table ->string('email')            ->unique();
            $table ->string('password');
            $table ->string('name')             ->nullable();
            $table ->rememberToken();
            $table ->timestamps();
            $table ->charset                     = 'utf8mb4';
            $table ->collation                   = 'utf8mb4_unicode_ci';
        });

        Schema::table('masters', function($table) {
            $table ->foreign('companies_id')    ->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masters');
    }
}
