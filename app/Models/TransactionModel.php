<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionModel extends Model
{
    protected $table = 'transaction';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'user_id',
    							'amount',
                                'date',
                                'activity_reason',
                                'approval',
    						];

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel', 'user_id', 'id');
    }

}
