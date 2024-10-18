<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('paternal_surname', 45);
            $table->string('maternal_surname', 45);
            $table->enum('type_document', ['DNI', 'PASAPORTE']);
            $table->integer('n_document');
            $table->date('date_of_birth');
            $table->string('email');
            $table->string('country', 60);
            $table->string('region', 60);
            $table->string('province', 60);
            $table->string('city', 60);
            $table->string('street', 60);
            $table->string('prefix', 6);
            $table->string('phone', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
