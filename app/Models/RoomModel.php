<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomModel extends Model
{
    protected $table = 'room';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'name',
                                'image',
                                'price',
                                'status',
                                'start_date',
                                'end_date',
    						];
}
