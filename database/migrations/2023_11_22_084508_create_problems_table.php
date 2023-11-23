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
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_id')->constrained('contests');
            $table->string('title');
            $table->string('description');
            $table->string('attachments')->nullable();
            $table->string('hints')->nullable();
            $table->string('sample_input');
            $table->string('sample_output');
            $table->string('actual_input');
            $table->string('actual_output');
            $table->integer('memory_limit');
            $table->integer('time_limit');
            $table->integer('visible_after_contest_end');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};
