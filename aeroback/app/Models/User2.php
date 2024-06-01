<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User2 extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users2';
    protected $primaryKey = 'idUser';
    protected $fillable = ['userName', 'userLastName1', 'userLastName2', 'userEmail', 'userPhone', 'userPassword', 'userTypeId_fk'];

    public function getAuthIdentifierName()
    {
        return 'userName';
    }
    public function getAuthPassword()
    {
        return $this->userPassword;
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'userTypeId_fk');
    }
}
