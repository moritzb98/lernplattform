<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::table('interests')->insert([
            ['name' => 'Informatik'],
            ['name' => 'Biologie'],
            ['name' => 'Chemie'],
            ['name' => 'Deutsch'],
            ['name' => 'Englisch'],
            ['name' => 'Erdkunde'],
            ['name' => 'Französisch'],
            ['name' => 'Geschichte'],
            ['name' => 'Gesundheit'],
            ['name' => 'Kunst'],
            ['name' => 'Latein'],
            ['name' => 'Mathematik'],
            ['name' => 'Medien und Kommunikation'],
            ['name' => 'Medizin'],
            ['name' => 'Musik'],
            ['name' => 'Physik'],
            ['name' => 'Sport'],
            ['name' => 'Unternehmertum'],
            ['name' => 'Weitere Sprachen'],
            ['name' => 'Wirtschaft'],
            ['name' => 'Ernährung'],
            ['name' => 'Gestaltung'],
            ['name' => 'Sonstiges'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interests');
    }
}
