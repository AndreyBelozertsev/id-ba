<?php


use Domain\User\Models\Role;
use Domain\User\Models\Branch;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Branch::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');
            $table->string('name');
            $table->string('family');
            $table->string('patronymic')->nullable();
            $table->string('phone');
            $table->date('birthday');
            $table->string('social_link')->nullable();
            $table->string('email', 190 )->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
