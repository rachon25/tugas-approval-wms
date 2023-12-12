<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPo extends Model
{
    use HasFactory;
    protected $table = 'daftar_po';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mr',
        'no_po',
        'po_name',
        'total_material',
        'assignment',
        'date_assign',
        'status_approval',
        'status_mr'
    ];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_mr = $model->getRandomString();
        });
    }
    public function generateRandomString($length = 6)
    {
        $characters = "0123456789";
        $charactersLength = strlen($characters);
        $randomString = "";
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $i < $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . "-MR-" . date("Y-His");
    }
    public function getRandomString()
    {
        $str = $this->generateRandomString();
        return $str;
    }
}