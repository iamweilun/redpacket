<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_send',
        'user_id_receive',
        'red_packet_id',
        'amount',
        'balance',
        'after_balance',
        'status',
        'action',
    ];
}
