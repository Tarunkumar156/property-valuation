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
        Schema::create('dwellingarealists', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Valuation::class);
            $table->foreignIdFor(Wizardthree::class);

            $table->string('name')->nullable();
            $table->double('asperplan', 10, 2)->nullable();
            $table->double('aspersite', 10, 2)->nullable();

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
        Schema::dropIfExists('dwellingarealists');
    }
};
