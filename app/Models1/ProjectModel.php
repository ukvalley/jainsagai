<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectModel extends Model
{
    protected $table = 'project';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'image',
                                'project_url',
                                'title_hindi',
								'description',
								'description_hindi',
    						];
}
