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
        Schema::create('wizardfours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Valuation::class);

            $table->integer('marketability')->nullable();
            $table->integer('extrapotentialvalue')->nullable();
            $table->integer('negativefactors')->nullable();
            $table->integer('compositerate')->nullable();
            $table->integer('adoptedcompositeratemin')->nullable();
            $table->integer('adoptedcompositeratemax')->nullable();
            $table->integer('adoptedbasiccompositerate')->nullable();
            $table->integer('buildingandservices')->nullable();
            $table->integer('landandothers')->nullable();
            $table->integer('registrarrate')->nullable();
            $table->integer('ageofbuilding')->nullable();
            $table->integer('lifeofbuilding')->nullable();
            $table->integer('salvagevalue')->nullable();
            $table->string('depreciatedratio')->nullable();
            $table->integer('replacementcost')->nullable();
            $table->integer('estimatedvalue')->nullable();
            $table->integer('depreciatedbuildingrate')->nullable();
            $table->integer('rateforlandandothers')->nullable();
            $table->integer('totalcompositerate')->nullable();
            $table->integer('say')->nullable();
            $table->integer('replacementcostofflat')->nullable();
            $table->integer('estimatedvalueofusd')->nullable();
            $table->integer('currentmarketrate')->nullable();
            $table->integer('servicelifebuilding')->nullable();
            $table->integer('depreciationaccounted')->nullable();
            $table->integer('depreciatedrateconstruction')->nullable();
            $table->integer('pwdrate')->nullable();
            $table->integer('pwdservicelifebuilding')->nullable();
            $table->integer('pwddepreciationaccounted')->nullable();
            $table->integer('pwddepreciatedrateconstruction')->nullable();
            $table->integer('pwdreplacementcostofflat')->nullable();
            $table->integer('pwdestimatedvalueofusd')->nullable();

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
        Schema::dropIfExists('wizardfours');
    }
};
