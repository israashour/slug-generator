<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlugHistory extends Model
{
    use HasFactory;

    protected $fillable = ['input_string', 'generated_slug'];
}
