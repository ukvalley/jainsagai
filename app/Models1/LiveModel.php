<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveModel extends Model
{
    protected $table = 'live';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'location',
                                'location_hindi',
    						];
}
