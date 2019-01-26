<?php

namespace Shahadatzcpe\BDLocation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Union extends Model
{
    use SoftDeletes;
    protected $table = 'bdlocation_unions';

    public function upazila()
    {
        return $this->belongsTo(Upazila::class );
    }
}
