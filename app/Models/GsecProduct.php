<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsecProduct extends Model
{
    use HasFactory;
    protected $table="Gsec-product";
    protected $primarykey = "id";
    protected $fillable = [
       length,
       order_by,
       page,
       order
    ];
}
