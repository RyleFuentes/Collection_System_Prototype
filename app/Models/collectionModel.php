<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collectionModel extends Model
{
    use HasFactory;

    protected $table = 'collection';
    protected $fillable = [
        'running_balance',
        'userID'
    ];
}
