<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class BlogModel extends Model  {

 protected $table = 'tbluser';

 protected $fillable = [ 'username', 'password','jobid'];

 protected $primaryKey = 'id';
 public $timestamps = false;
 protected $hidden = ['password'];


}