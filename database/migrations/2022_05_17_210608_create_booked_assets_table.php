<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Asset;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignIDFor(Asset::class);
            $table->foreignIDFor(User::class);
            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('allday')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('url')->nullable();
            $table->string('title');
            $table->text('extended_props')->nullable();
            $table->string('display')->nullable();
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
        Schema::dropIfExists('booked_assets');
    }
};
