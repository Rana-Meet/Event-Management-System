<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;

    // 1. Corrected spelling from 'fillabel' to 'fillable'
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'plan',
        'message'
    ];

    // 2. If your table is named 'demo_requests', add this line:
    // protected $table = 'demo_requests';
}