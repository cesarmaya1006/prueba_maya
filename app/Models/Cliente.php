<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cliente extends Model
{
    use HasFactory, Notifiable;
    protected $table = "clientes";
    protected $guarded = ['id'];

    public function ciudad()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}
