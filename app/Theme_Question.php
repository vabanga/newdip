<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme_Question extends Model
{
    protected $fillable = ['theme_id','question_id'];
    protected $table = 'theme_questions';
    public $timestamps = false;
}
