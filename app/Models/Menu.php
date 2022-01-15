<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // linha abaixo para quando não for usar migrations
    public $timestamps = false;
    use HasFactory;

    public $table = 'menus';
}
