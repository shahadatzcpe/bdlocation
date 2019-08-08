<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupBdLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdlocation_divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('bn_name');
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('bdlocation_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('division_id');
            $table->string('name');
            $table->string('bn_name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('division_id')
                ->references('id')->on('bdlocation_divisions')
                ->onDelete('cascade');
        });
        Schema::create('bdlocation_upazilas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('district_id');
            $table->string('name', 30);
            $table->string('bn_name', 50)->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('district_id')
                ->references('id')->on('bdlocation_districts')
                ->onDelete('cascade');
        });
        Schema::create('bdlocation_police_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('district_id');
            $table->string('name', 50);
            $table->string('bn_name', 50)->nullable();
            $table->string('lat', 40)->nullable();
            $table->string('lon', 40)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('duty_officer_ext')->nullable();
            $table->string('dmp')->nullable();
            $table->string('tnt')->nullable();
            $table->string('cell')->nullable();
            $table->string('ii_cell', 30)->nullable()->description('Inspector Investigation Cell');
            $table->string('oic_dmp', 10)->nullable()->description('Officers In charge DMP');
            $table->string('oic_cell', 30)->nullable()->description('Officers In charge CELL');
            $table->string('oic_fax', 30)->nullable()->description('Officers In charge FAX');
            $table->string('oic_email', 30)->nullable()->description('Officers In charge EMAIL');
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('district_id')
                ->references('id')->on('bdlocation_districts')
                ->onDelete('cascade');
        });
        Schema::create('bdlocation_unions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('upazila_id');
            $table->string('name', 30);
            $table->string('bn_name', 50)->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('upazila_id')
                ->references('id')->on('bdlocation_upazilas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bdlocation_unions');
        Schema::dropIfExists('bdlocation_thanas');
        Schema::dropIfExists('bdlocation_upazilas');
        Schema::dropIfExists('bdlocation_districts');
        Schema::dropIfExists('bdlocation_divisions');
    }
}
