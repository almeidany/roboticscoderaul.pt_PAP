<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    public function contest()
    {
        return $this->belongsTo(Contest::class, 'contest_id');
    }
}
