<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttractionsModel extends Model
{
    protected $table = 'attractions';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'image',
                                'description',
                                'date',
    						];
}
