<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'media', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' )->nullable();
            $table->string( 'path' );
            $table->string( 'alt_text' )->nullable();
            $table->text( 'description' )->nullable();
            $table->integer( 'height' )->nullable();
            $table->integer( 'width' )->nullable();
            $table->string( 'mime_type' )->nullable();
            $table->string( 'size' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'media' );
    }
};
