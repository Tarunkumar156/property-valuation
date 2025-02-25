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
        Schema::create('wizardfives', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Valuation::class);

            $table->integer('buildingplusserviceqty')->nullable();
            $table->integer('buildingplusservicerate')->nullable();
            $table->integer('coveredcarparkqty')->nullable();
            $table->integer('coveredcarparkrate')->nullable();
            $table->integer('coveredcarparkguide')->nullable();
            $table->integer('liftqty')->nullable();
            $table->integer('liftrate')->nullable();
            $table->integer('liftguide')->nullable();
            $table->integer('modularkitchenqty')->nullable();
            $table->integer('modularkitchenrate')->nullable();
            $table->integer('modularkitchenguide')->nullable();
            $table->integer('superfinefinishqty')->nullable();
            $table->integer('superfinefinishrate')->nullable();
            $table->integer('superfinefinishguide')->nullable();
            $table->integer('interiordecorationqty')->nullable();
            $table->integer('interiordecorationrate')->nullable();
            $table->integer('interiordecorationguide')->nullable();
            $table->integer('electricaldepositfittingqty')->nullable();
            $table->integer('electricaldepositfittingrate')->nullable();
            $table->integer('electricaldepositfittingguide')->nullable();
            $table->integer('extracollapsiblegateqty')->nullable();
            $table->integer('extracollapsiblegaterate')->nullable();
            $table->integer('extracollapsiblegateguide')->nullable();
            $table->integer('potentialvalueqty')->nullable();
            $table->integer('potentialvaluerate')->nullable();
            $table->integer('potentialvalueguide')->nullable();
            $table->integer('estimatebuildingplusservicerate')->nullable();
            $table->integer('estimatecoveredcarparkrate')->nullable();
            $table->integer('estimateliftrate')->nullable();
            $table->integer('estimatemodularkitchenrate')->nullable();
            $table->integer('estimatesuperfinefinishrate')->nullable();
            $table->integer('estimateinteriordecorationrate')->nullable();
            $table->integer('estimateelectricaldepositfittingrate')->nullable();
            $table->integer('estimateextracollapsiblegaterate')->nullable();
            $table->integer('estimatepotentialvaluerate')->nullable();
            $table->integer('estimatepresenttotalvalue')->nullable();
            $table->integer('guidelinepresenttotalvalue')->nullable();
            $table->integer('guidelinebuildingplusservice')->nullable();
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
        Schema::dropIfExists('wizardfives');
    }
};
