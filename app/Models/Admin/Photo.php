<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

//    protected $table = 'photos';
    protected $fillable=([
      'alt_text','photo',
    ]);
}
