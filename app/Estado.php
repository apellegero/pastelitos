<?php
// 0 Pendiente
// 1 Aceptado/pagado
// 2 En Curso
// 3 Enviado
// 4 Entregado
// 5 Anulado
// 6 Rechazado
namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'estado';
}
