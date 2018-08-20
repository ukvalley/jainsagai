<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SongModel extends Model
{
    protected $table = 'song';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'song',
    						];
}
