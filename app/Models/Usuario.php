<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NivelUsuario;

class Usuario extends Model
{
    // linha abaixo para quando não for usar migrations
    public $timestamps = false;
    use HasFactory;
	
	public function nivel()
	{
		return $this->belongsTo(NivelUsuario::class, 'id', 'nivelUsuarios_id');
	}
}
