<?php

use App\Models\Admin\Settings\Mastersetting\Engineer;
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
        Schema::create('wizardones', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Valuation::class);
            $table->foreignIdFor(Engineer::class);
            $table->string('fileno')->nullable();
            $table->date('filedate')->nullable();
            $table->string('purposeofvaluation')->nullable();
            $table->date('dateofinspection')->nullable();
            $table->string('titledeednumberdate')->nullable();
            $table->date('dateonvaluation')->nullable();
            $table->string('document1')->nullable();
            $table->string('document2')->nullable();
            $table->string('document3')->nullable();
            $table->string('document4')->nullable();
            $table->integer('propertydesccription')->nullable();
            $table->string('plotorsurveyno')->nullable();
            $table->string('doorno')->nullable();
            $table->string('tsnoorvillage')->nullable();
            $table->string('wardortaluka')->nullable();
            $table->string('mandalordistrict')->nullable();
            $table->string('validityoflayout')->nullable();
            $table->date('dateofissue')->nullable();
            $table->string('approvedmaporplanissuingauthority')->nullable();
            $table->date('approvedmapdate')->nullable();
            $table->boolean('plan_is_verified')->default(0)->nullable();
            $table->string('othercomments')->nullable();
            $table->text('addressofproperty')->nullable();
            $table->string('cityortown')->nullable();
            $table->string('residentialarea')->nullable();
            $table->string('commercialarea')->nullable();
            $table->string('industrialarea')->nullable();
            $table->integer('classificationofarea')->nullable();
            $table->integer('classificationofarea1')->nullable();
            $table->integer('propertycomesunder')->nullable();
            $table->string('coveredunder')->nullable();
            $table->string('boundaryofpropertynorth')->nullable();
            $table->string('boundaryofpropertysouth')->nullable();
            $table->string('boundaryofpropertyeast')->nullable();
            $table->string('boundaryofpropertywest')->nullable();
            $table->string('dimensionofsiteasperdeednorth')->nullable();
            $table->string('dimensionofsiteasexistingnorth')->nullable();
            $table->string('dimensionofsiteasperdeedsouth')->nullable();
            $table->string('dimensionofsiteasexistingsouth')->nullable();
            $table->string('dimensionofsiteasperdeedeast')->nullable();
            $table->string('dimensionofsiteasexistingeast')->nullable();
            $table->string('dimensionofsiteasperdeedwest')->nullable();
            $table->string('dimensionofsiteasexistingwest')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('what3words')->nullable();
            $table->string('googlemaplocation')->nullable();
            $table->integer('extentofsite')->nullable();
            $table->integer('occupiedby')->nullable();

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
        Schema::dropIfExists('wizardones');
    }
};
