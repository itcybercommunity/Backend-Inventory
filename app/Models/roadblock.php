<?php

namespace App\Models;

use App\Models\retur;
use App\Models\outbound;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class roadblock extends Model
{
    use HasFactory;
    protected $fillable = ['faktur_outbound', 'id_employment'];

    public function outbound()
    {
        return $this->belongsTo(outbound::class);
    }

    public function retur()
    {
        return $this->belongsTo(retur::class);
    }
}
