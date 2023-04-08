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
        Schema::create('multinationals', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id',30);
            $table->string('company_name',60);
            $table->string('person_name',60);
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('official_email',70);
            $table->string('phone_number',22);
            $table->string('web_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multinationals');
    }
};
