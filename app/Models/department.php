<?php

namespace App\Models;

use App\Models\employment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class department extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function employment()
    {
        return $this->hasMany(employment::class);
    }
}
