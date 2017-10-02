<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pr_Resultado extends Model
{
    use SoftDeletes;
    protected $table = "pr_resultados";
}
