<?php

namespace App\Models;

use App\Models\employment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class outbound extends Model
{
    use HasFactory;
    protected $fillable = ['date','total'];

    public function employment()
    {
        return $this->hasOne(employment::class);
    }
}
