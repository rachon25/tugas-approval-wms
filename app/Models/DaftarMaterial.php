<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMaterial extends Model
{
    use HasFactory;
    protected $table = 'daftar_materials';
    protected $primaryKey = 'id_part_num';
    protected $fillable = [
        "part_num",
        "material_name",
        "uom"
    ];
}
