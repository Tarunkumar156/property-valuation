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
        Schema::create('wizardthrees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Valuation::class);
            $table->string('flatfloor')->nullable();
            $table->string('doornoofflat')->nullable();
            $table->string('roof')->nullable();
            $table->string('flooring')->nullable();
            $table->string('doors')->nullable();
            $table->string('windows')->nullable();
            $table->string('fittings')->nullable();
            $table->string('finishing')->nullable();
            $table->string('assessmentno')->nullable();
            $table->string('taxpaidname')->nullable();
            $table->string('taxamount')->nullable();
            $table->string('electricityserviceconnectionno')->nullable();
            $table->string('metercardname')->nullable();
            $table->string('maintenanceofflat')->nullable();
            $table->integer('builtuparea')->nullable();
            $table->integer('plinthareaofflat')->nullable();
            $table->integer('floorspaceindex')->nullable();
            $table->integer('carpetareaofflat')->nullable();
            $table->integer('areaoflocality')->nullable();
            $table->integer('usagepurpose')->nullable();
            $table->integer('owneroccupiedorletout')->nullable();
            $table->integer('monthlyrent')->nullable();
            $table->double('setbacksasperplannorth', 10, 2)->nullable();
            $table->double('setbacksasperplansouth', 10, 2)->nullable();
            $table->double('setbacksasperplaneast', 10, 2)->nullable();
            $table->double('setbacksasperplanwest', 10, 2)->nullable();
            $table->double('setbacksaspersitenorth', 10, 2)->nullable();
            $table->double('setbacksaspersitesouth', 10, 2)->nullable();
            $table->double('setbacksaspersiteeast', 10, 2)->nullable();
            $table->double('setbacksaspersitewest', 10, 2)->nullable();

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
        Schema::dropIfExists('wizardthrees');
    }
};
