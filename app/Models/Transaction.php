<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction_request';
    protected $fillable = [
        'Amount',
        'transaction_date',
        'userID',
        'Status',
        

    ];

    protected $primaryKey = 'transaction_id';
}
