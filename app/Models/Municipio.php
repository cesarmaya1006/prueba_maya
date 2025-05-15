<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Municipio extends Model
{
    use HasFactory, Notifiable;
    protected $table = "municipios";
    protected $guarded = ['id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'municipio_id', 'id');
    }
}
