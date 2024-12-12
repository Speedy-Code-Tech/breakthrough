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
        if (!Schema::hasTable('service_requests')) {

            Schema::create('service_requests', function (Blueprint $table) {
                $table->id();
                $table->string('requesting_party');
                $table->string('mobile_number');
                $table->string('email_address');
                $table->string('activity_title');
                $table->string('coverage')->nullable();
                $table->text('event_description');
                $table->text('program_highlights');
                $table->date('date');
                $table->time('time');
                $table->string('venue');
                $table->string('status')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
