<?php

namespace App\Models;

use App\Models\roadblock;
use App\Models\outbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class retur extends Model
{
    use HasFactory;
    protected $filable = ['date', 'qty','reason', 'id_outbound_detail', 'id_roadblock'];

    public function outbound_detail()
    {
        return $this->hasOne(outbound_detail::class);
    }
    public function roadblock()
    {
        return $this->hasOne(roadblock::class);
    }
}
