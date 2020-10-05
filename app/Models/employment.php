<?php

namespace App\Models;

use App\Models\department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'gender', 'email', 'password', 'phone', 'address'];

    public function department()
    {
        return $this->belongsTo(department::class);
    }
}
