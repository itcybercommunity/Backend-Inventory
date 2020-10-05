<?php

namespace App\Models;

use App\Models\inbound;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class po extends Model
{
    use HasFactory;
    protected $fillable = ['date','total', 'status'];

    public function inbound()
    {
        return $this->belongsTo(inbound::class);
    }
}
