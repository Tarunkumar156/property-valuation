<?php

use App\Models\Admin\Valuation\Valuation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizardsixes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Valuation::class);
            $table->string('screenshot1')->nullable();
            $table->string('screenshot2')->nullable();
            $table->string('screenshot3')->nullable();
            $table->string('screenshot4')->nullable();
            $table->string('governmentnotification1')->nullable();
            $table->string('governmentnotification2')->nullable();
            $table->string('mapscreenshot')->nullable();
            $table->string('propertyphoto1')->nullable();
            $table->string('propertyphoto2')->nullable();
            $table->string('propertyphoto3')->nullable();
            $table->string('propertyphoto4')->nullable();
            $table->string('propertyphoto5')->nullable();
            $table->string('propertyphoto6')->nullable();
            $table->string('propertyphoto7')->nullable();
            $table->string('propertyphoto8')->nullable();
            $table->string('propertyphoto9')->nullable();
            $table->string('propertyphoto10')->nullable();
            $table->string('propertyphoto11')->nullable();
            $table->string('propertyphoto12')->nullable();
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
        Schema::dropIfExists('wizardsixes');
    }
};
