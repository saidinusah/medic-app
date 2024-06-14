<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('organization_user', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->timestamps();
      $table->foreignUuid('user_id')->constrained('users')
        ->cascadeOnDelete()->cascadeOnUpdate();
      $table->foreignUuid('organization_id')->constrained('organizations')
        ->cascadeOnUpdate()->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('organization_user');
  }
};
