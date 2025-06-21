<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoListModel extends Model
{
    protected $table    = 'ToDoList';
    protected $fillable = ['ToDoList', 'app_user_id'];
    public $timestamps  = false;
}
