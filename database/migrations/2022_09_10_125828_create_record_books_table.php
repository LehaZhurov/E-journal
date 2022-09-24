<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;
use App\Models\TypeAttestation;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('record_books', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('student_id');
            $table->foreignId('teacher_id');
            $table->foreignIdFor(Subject::class); 
            $table->foreignIdFor(TypeAttestation::class); 
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
        Schema::dropIfExists('record_books');
    }
};
