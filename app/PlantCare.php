<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantCare extends Model
{
    public function plant()
    {
        return $this->belongsTo(Plants::class);
    }
}
