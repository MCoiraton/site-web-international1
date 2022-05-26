<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatureAjout extends Model
{
    protected $table='candidatures_ajout';
    protected $primaryKey='email';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable = ['email'];
}
