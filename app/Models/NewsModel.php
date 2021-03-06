<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'image',
                                'description',
                                'date',
    						];
}
