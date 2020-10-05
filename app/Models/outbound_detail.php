<?php

namespace App\Models;

use App\Models\outbound;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class outbound_detail extends Model
{
    use HasFactory;
    protected $fillable = ['qty', 'total'];

    public function outbound()
    {
        return $this->belongsTo(outbound::class);
    }
}
