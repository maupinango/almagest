<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment_term extends Model
{
    protected $table = 'payment_terms';

    protected $fillable = [
        'description', 'deleted'
    ];

    public function company(): BelongsTo{
        return $this->belongsTo(Company::class, 'payment_term_id');
    }

}
