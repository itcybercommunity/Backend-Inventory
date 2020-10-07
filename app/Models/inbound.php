<?php

namespace App\Models;

use App\Models\po;
use App\Models\inbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inbound extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'total', 'status'];

    public function po()
    {
        return $this->belongsTo(po::class);
    }
    public function inbound_detail()
    {
        return $this->hasOne(inbound_detail::class);
    }
}
