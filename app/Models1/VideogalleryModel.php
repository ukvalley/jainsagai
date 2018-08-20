<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideogalleryModel extends Model
{
    protected $table = 'video_gallery';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'category',
                                'video',
                                'thum'
    						];
}
