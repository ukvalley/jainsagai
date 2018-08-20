<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryModel extends Model
{
    protected $table = 'gallery';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'category',
                                'image',
    						];
}
