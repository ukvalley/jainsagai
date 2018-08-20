<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialModel extends Model
{
    protected $table = 'social_activity';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'title_hindi',
                                'image',
                                'project_url'
    						];
}
