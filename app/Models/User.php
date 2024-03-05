<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'users_cms';
    protected $primaryKey = 'id';
   // protected $fillable=['first_name','last_name','email','password' , 'role_code' => 'cw'];
  
}
