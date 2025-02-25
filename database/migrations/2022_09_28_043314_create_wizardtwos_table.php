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
        Schema::create('wizardtwos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Valuation::class);
            $table->string('nameofapartment')->nullable();
            $table->integer('descriptionoflocality')->nullable();
            $table->integer('yearofconstruction')->nullable();
            $table->string('nooffloors')->nullable();
            $table->string('typeofstructure')->nullable();
            $table->string('noofunits')->nullable();
            $table->integer('qualityofconstruction')->nullable();
            $table->integer('appearanceofconstruction')->nullable();
            $table->integer('maintenanceofbuilding')->nullable();
            $table->boolean('is_lift')->default(0)->nullable();
            $table->boolean('is_watersupply')->default(0)->nullable();
            $table->boolean('is_compoundwall')->default(0)->nullable();
            $table->boolean('is_pavement')->default(0)->nullable();
            $table->boolean('is_carparking')->default(0)->nullable();
            $table->boolean('is_underwater')->default(0)->nullable();

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
        Schema::dropIfExists('wizardtwos');
    }
};
