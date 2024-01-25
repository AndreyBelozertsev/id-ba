<?php


use Domain\User\Models\User;
use Domain\Idea\Models\IdeaCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('social_link')->nullable();
            $table->foreignIdFor(IdeaCategory::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');
            $table->foreignIdFor(User::class)
                    ->nullable()
                    ->constrained()
                    ->onUpdate('cascade')
                    ->nullOnDelete('cascade');
            $table->text('reason_cancellation')->nullable();
            $table->string('status')->default('moderation');
            $table->string('status_implementation')->default('receive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
