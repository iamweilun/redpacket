<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class red_packet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'send_quantity',
        'receive_quantity',
    ];
}
