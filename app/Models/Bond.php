<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;
    protected $fillable = [
        'Type',
        'Segment',
        'Yield(%)',
        'Tenure',
        'Price',
        'Min Investment',
        'Coupon Rate',
        'IP Frequency',
    ];
}
