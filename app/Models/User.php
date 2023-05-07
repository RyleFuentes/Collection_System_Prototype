<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function collections(){
        return $this->hasMany(collectionModel::class, 'userID');
    }

    protected $table = 'user';
    protected $fillable = ['FirstName', 'LastName', 'Email', 'Password', 'role', 'nickname'];
    protected $primaryKey = 'user_id';
}
