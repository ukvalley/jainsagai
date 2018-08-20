<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingModel extends Model
{
    protected $table = 'booking';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'user_id',
                                'room_id',
                                'promocode',
                                'amount',
                                'status',
    						];

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel', 'user_id', 'id');
    }

}
