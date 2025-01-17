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
    
    Schema::create('quotes', function (Blueprint $table) {
      $table->id();// id->bigint ,auto_increment,primary_key
      $table->timestamps();
      $table->string('author');// string= varchar(255)
      $table->text('quote');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('quotes');
  }
};