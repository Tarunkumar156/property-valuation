<?php

use App\Models\Admin\Auth\User;
use App\Models\Admin\Settings\Mastersetting\Category;
use App\Models\Customer\Auth\Customer;
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
        Schema::create('valuations', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(Category::class);
            $table->string('latitude')->nullable();
            $table->string('logitude')->nullable();
            $table->string('googlemaplocation')->nullable();
            $table->string('threewordlocation')->nullable();

            $table->text('note')->nullable();
            $table->string('sys_id')->unique();
            $table->string('uniqid')->unique();
            $table->uuid('uuid')->unique();
            $table->integer('sequence_id');
            $table->foreignIdFor(User::class);
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->boolean('active', array(0, 1))->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('valuations');
    }
};
