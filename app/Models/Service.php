<?php

namespace App\Models;

use App\Traits\Transliteratable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory, Transliteratable;
    protected $guarded = false;

    public function sections():BelongsTo
    {
        return $this->BelongsTo(Section::class, 'section_id');
    }
}
