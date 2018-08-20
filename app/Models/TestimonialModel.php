<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialModel extends Model
{
    protected $table = 'testimonial';

    protected $primaryKey = "id";

    protected $fillable   = [	
                                'title',
                                'description',
                                'date',
    						];
}
