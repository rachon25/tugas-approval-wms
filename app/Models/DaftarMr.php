<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMr extends Model
{
    use HasFactory;
    protected $table = 'input_mrs';
    protected $primaryKey = 'id';
    protected $fillable = [
        "id_mr",
        "no_po",
        "part_num",
        "qty_plan",
        "assignment",
        "date_assign",
        "status_approval",
        "status_mr",
    ];
    public function daftarMaterial()
    {
        return $this->belongsTo(DaftarMaterial::class, 'part_num', 'part_num');
    }
    public function daftarPoRelasi()
    {
        return $this->belongsTo(DaftarPo::class,'no_po','no_po' );
    }
    public function items()
    {
        return $this->hasMany(DaftarPo::class, "id_mr");
    }

}