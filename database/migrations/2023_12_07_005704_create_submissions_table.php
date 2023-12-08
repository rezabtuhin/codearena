<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('problem_id');
            $table->unsignedBigInteger('contest_id')->nullable();
            $table->unsignedBigInteger('submitted_by');
            $table->string('language', 20);
            $table->text('code');
            $table->timestamp('submitted_at')->useCurrent();
            $table->unsignedBigInteger('verdict')->nullable();
            $table->text('status');
            $table->integer('score')->nullable();

            // Foreign keys
            $table->foreign('problem_id')->references('id')->on('problems');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('submitted_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('submissions');
    }
};
