<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    use HasFactory;
    protected $table = 'nivelusuarios';
    protected $fillable = ['nome'];

	public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
