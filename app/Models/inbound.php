<?php

namespace App\Models;

use App\Models\po;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inbound extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'total', 'status'];

    public function pos()
    {
        return $this->hasMany(po::class);
    }
}
