<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tel','email', 'user_id', 'avatar'];

    public function jiris():BelongsToMany
    {
        return $this->belongsToMany(Jiri::class, 'homeworks');
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
