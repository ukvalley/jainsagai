<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildrengalleryModel extends Model
{
    protected $table = 'children_gallery';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'image',
    						];
}
