<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'tag_id', 'title', 'content'];

    //relacion n:1 con tags
    public function tag(): BelongsTo{
        return $this -> belongsTo(Tag::class);
    }

    //relacion n:1 con users
    public function user(): BelongsTo{
        return $this -> belongsTo(User::class);
    }


    // para que title y content se guarden en mayuscula
    public function title(): Attribute{
        return Attribute::make(
            set: fn(string $v) => ucfirst($v),
        );
    }

    public function content(): Attribute{
        return Attribute::make(
            set: fn(string $v) => ucfirst($v),
        );
    }
}
