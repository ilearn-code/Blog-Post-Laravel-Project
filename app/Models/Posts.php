<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table='posts_cms';
    protected $primaryKey = 'id';

    public function author()
    {

        return $this->belongsTo(User::class, 'user_id')->select('id','first_name','last_name');
    }
    //protected $fillable=['first_name','last_name','email','password'];
  
}
