<?php

namespace App\Models;

use App\Models\type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function type()
    {
        return $this->belongsTo(type::class);
    }
}
