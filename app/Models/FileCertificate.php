<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileCertificate extends Model
{
    protected $table = "ArchivoEntradaPlan";
    protected $primaryKey = "IdArchivoEntrada";


}