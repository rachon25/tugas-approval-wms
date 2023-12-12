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
        Schema::create('input_mrs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('id_mr');
            $table->string('no_po');
            $table->string('part_num');
            $table->unsignedInteger('qty_plan');
            $table->string('assignment');
            $table->date('date_assign');
            $table->string('status_approval')->default('Waiting Approval');          
            $table->string('status_mr')->default('N/Y Release');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_mrs');
    }
};
