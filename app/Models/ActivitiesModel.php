<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivitiesModel extends Model
{
    protected $table = 'activities';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'category',
                                'image',
                                'description',
                                'subtitle',
    						];
}
