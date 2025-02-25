<?php

use App\Models\Admin\Valuation\Valuation;
use App\Models\Admin\Valuation\Wizardthree;
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
        Schema::create('salesdeeednamelists', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Valuation::class);
            $table->foreignIdFor(Wizardthree::class);

            $table->string('name')->nullable();
            $table->string('sdof')->nullable();
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
        Schema::dropIfExists('salesdeeednamelists');
    }
};
