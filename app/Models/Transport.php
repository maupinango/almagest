<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transport extends Model
{
    protected $table = 'transports';

    protected $fillable = [
        'min', 'max', 'price', 'deleted'
    ];

    public function company(): HasMany{
        return $this->hasMany(Company::class, 'transport_id');
    }

}
