<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeditationModel extends Model
{
    protected $table = 'meditation';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'title_hindi',
                                'image',
                                'description',
                                'song',
                                'song_name',
                                'video',
                                'thum',
    						];
}
