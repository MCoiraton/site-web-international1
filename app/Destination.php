<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $table='destination';
    protected $primaryKey='nom';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable=["nom","intro","temoignages","astucesinfos"];
}
