<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Portfolio;

class Project extends Model
{
    protected $fillable = [
        'title','description','photo','cat_name',
        'project_start','project_address','status'
    ];
}
