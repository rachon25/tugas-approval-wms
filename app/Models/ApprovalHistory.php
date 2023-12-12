<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalHistory extends Model
{
    use HasFactory;
    protected $table = 'approval_histories';
    protected $fillable = [
        "no_po",
        "po_name",
        "id_mr",
        "name",
    ];
}
