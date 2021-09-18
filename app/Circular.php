<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    protected $table = 'circulars';

    protected $fillable = [
        'title', 'vacancy', 'workplace', 'date', 'salary', 'type', 'details',
    ];
}
