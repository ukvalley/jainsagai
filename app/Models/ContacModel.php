<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel extends Model
{
    protected $table = 'contact';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'name',
                                'email',
                                'mobile',
                                'message',
    						];
}
