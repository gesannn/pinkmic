<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration {public function up(){Schema::create('studios',function(Blueprint $t){$t->id();$t->string('name');$t->string('location');$t->string('type');$t->text('description');$t->decimal('price_per_hour',12,2);$t->unsignedInteger('capacity')->default(4);$t->text('image')->nullable();$t->timestamps();});}public function down(){Schema::dropIfExists('studios');}};
