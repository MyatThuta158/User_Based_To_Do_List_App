<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class app_user extends Authenticatable
{
    protected $table    = 'app_user';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps  = false;

}
