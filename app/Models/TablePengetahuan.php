<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePengetahuan extends Model
{
    public function getTable() {
        return 'pengetahuan';
    }

    use HasFactory;
    protected $primaryKey = 'NISN';
    public $timestamps = false;
    protected $table = 'peng_pai';
    protected $guarded = [];
}