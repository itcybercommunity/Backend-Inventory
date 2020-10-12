<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employment;

class department extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function employment()
    {
        return $this->hasMany('App\Models\employment');
    }
}
