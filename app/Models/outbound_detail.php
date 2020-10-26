<?php

namespace App\Models;

use App\Models\outbound;
use App\Models\inbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class outbound_detail extends Model
{
    use HasFactory;
    protected $fillable = ['faktur_outbound', 'id_inbound_detail','qty', 'total'];

    public function inbound_detail()
    {
        return $this->hasOne(inbound_detail::class);
    }
    public function outbound()
    {
        return $this->belongsTo(outbound::class);
    }
    public function retur()
    {
        return $this->belongsTo(retur::class);
    }

}
