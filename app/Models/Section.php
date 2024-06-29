<?php

namespace App\Models;

use App\Traits\Transliteratable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory, Transliteratable;
    protected $guarded = false;

    public function services():HasMany
    {
        return $this->hasMany(Service::class, 'section_id');
    }
}
