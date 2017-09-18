<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroImageneologia extends Model
{

    protected $table      = 'registros_imageneologicos';
    protected $primaryKey = 'id_registro_imageneologico';
    protected $fillable   = [
       'id_registro_imageneologico',
          'consulta_id',
          'paciente_id',
          'fecha',
          'ultimo_usuario',
          'ordenado_por' ,
          'motivo_examen' ,
          'panoramica',
          'periapical' ,
          'interproximal',
          'otro' ,
          'espec_otro',
          'apta_interpretar' ,
          'alta_densidad' ,
          'baja_densidad' ,
          'borrosa',
          'distorsion',
          'defecto' ,
          'defecto_imagen' ,
          'radiolucida' ,
          'radiopaca' ,
          'mixta' ,
          'seno_maxilar_lado' ,
          'seno_maxilar_borde' ,
          'seno_maxilar_forma' ,
          'cuello_condilo' ,
          'fosa_nasal_lado' ,
          'fosa_nasal_borde' ,
          'fosa_nasal_forma' ,
          'arco_lado' ,
          'discontinuidad',
          'presencia_radiopacidad' ,
          'espacio_aereo_lado' ,
          'espacio_aereo_bordes' ,
          'espacio_aereo_forma' ,
          'espacio_aereo_numero' ,
          'espacio_aereo_ubicacion' ,
          'anomalia_tam' ,
          'espec_anomalia_tam' ,
          'supernumerarios' ,
          'taurodontismo' ,
          'hipercementosis' ,
          'otras' ,
          'radiolucides_coronal' ,
          'region_apical' ,
          'cresta_alveolar' ,
          'dientes_inclinados' ,
          'espacios_abiertos' ,
          'hallazgos_adicionales' ,
          'uno_dos' ,
          'uno_uno' ,
          'dos_uno' ,
          'interpretacion' ,
          'recomendaciones' ,
          'profesor',
          'validar' ,
          'fecha_validacion' ,
        
    ];
    public $timestamps = true;

}
