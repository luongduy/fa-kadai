<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class FAScanLog extends BaseModel
{
    protected $table = 'fa_scan_logs';
    public $timestamps = false;
}
