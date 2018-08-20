<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeModel extends Model
{
    protected $table = 'promocode';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'code',
                                'offer',
    						];
}
