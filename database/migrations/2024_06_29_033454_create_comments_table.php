<?php

use App\Models\Comment;
use App\Models\Work;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('contents');

            // $table->unsignedBigInteger('work_id');
            $table->foreignId('user_id')->constrained()->delete('cascade');
            $table->foreignIdFor(Work::class)->constrained()->onDelete('cascade');
            // $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
