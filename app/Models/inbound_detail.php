<?php

namespace App\Models;

use App\Models\inbound;
use App\Models\po_detail;
use App\Models\outbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inbound_detail extends Model
{
    use HasFactory;
    protected $fillable = ['qty', 'price_sell'];

    public function po_detail()
    {
        return $this->belongsTo(po_detail::class);
    }
    public function inbound()
    {
        return $this->belongsTo(inbound::class);
    }
    public function outbound_detail()
    {
        return $this->belongsTo(outbound_detail::class);
    }
}
