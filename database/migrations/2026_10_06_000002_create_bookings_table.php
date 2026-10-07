<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration {public function up(){Schema::create('bookings',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->foreignId('studio_id')->constrained()->cascadeOnDelete();$t->date('booking_date');$t->time('start_time');$t->time('end_time');$t->decimal('total_price',12,2);$t->string('status')->default('pending');$t->timestamps();});}public function down(){Schema::dropIfExists('bookings');}};
