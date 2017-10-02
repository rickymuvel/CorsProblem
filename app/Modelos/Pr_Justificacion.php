<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pr_Justificacion extends Model
{
    use SoftDeletes;
    protected $table = "pr_justificaciones";
}
