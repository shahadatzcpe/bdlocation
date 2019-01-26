<?php

namespace Shahadatzcpe\BDLocation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    protected $table = 'bdlocation_districts';

    public function division()
    {
        return $this->belongsTo(Division::class );
    }

    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }

    public function policeStations()
    {
        return $this->hasMany(PoliceStation::class);
    }
}
