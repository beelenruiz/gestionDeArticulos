<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    //

    protected $fillable = ['name', 'color', 'description'];

    //relacion 1:n con articles
    public function articles(): HasMany{
        return $this -> hasMany(Article::class);
    }

    // para que el name se almacene en minuscula
    public function name(): Attribute{
        return Attribute::make(
            set: fn(string $v) => strtolower($v),
        );
    }
}
