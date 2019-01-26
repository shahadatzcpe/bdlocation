<?php

namespace Shahadatzcpe\BDLocation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoliceStation extends Model
{
    use SoftDeletes;
    protected $table = 'bdlocation_police_stations';

    public function district()
    {
        return $this->belongsTo(District::class );
    }
}
