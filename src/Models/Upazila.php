<?php

namespace Shahadatzcpe\BDLocation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upazila extends Model
{
    use SoftDeletes;
    protected $table = 'bdlocation_upazilas';

    public function district()
    {
        return $this->belongsTo(District::class );
    }

    public function unions(){
        return $this->hasMany(Union::class);
    }
}
