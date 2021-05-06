<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model
{
    protected $fillable = ['questions_id', 'answer'];
}
