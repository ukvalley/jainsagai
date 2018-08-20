<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrjaaworldModel extends Model
{
    protected $table = 'urjaaworld';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'image',
                                'description',
                                'title_hindi',
                                'description_hindi',
                                'date',
                                'video',
                                'thum',
    						];
}
