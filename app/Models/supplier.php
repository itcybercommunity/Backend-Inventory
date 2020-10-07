<?php

namespace App\Models;

use App\Models\po;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function pos()
    {
        return $this->hasMany(po::class);
    }
}
