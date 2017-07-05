<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroImageneologia extends Model
{

    protected $table      = 'registros_imageneologicos';
    protected $primaryKey = 'id_registro_imageneologico';
    protected $fillable   = [
       'id_registro_imageneologico',
          'titulo_imagen',
          'ruta',
          'consulta_id',
          'paciente_id',
          'fecha',
          'usuario_id',
          'estudio_imagen',
        
    ];
    public $timestamps = true;

}
