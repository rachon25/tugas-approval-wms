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
        Schema::create('daftar_po', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('id_mr')->unique();
            $table->string('no_po')->unique();
            $table->string('po_name')->unique();
            $table->integer('total_material');
            $table->string('assignment');
            $table->date('date_assign');
            $table->string('status_approval');          
            $table->string('status_mr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_po');
    }
};
