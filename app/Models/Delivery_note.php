<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery_note extends Model
{
    use HasFactory;

    protected $table = 'delivery_note';

    protected $fillable = [
        'num',
        'issuedate',
        'order_id',
        'deleted'
    ];

       public function invoices(): HasMany
   {
       return $this->hasMany(Invoice::class, 'delivery_note_id');
   }


   public function order(): BelongsTo
   {
       return $this->belongsTo(Order::class, 'order_id');
   }


   public function deliveryNoteLines(): HasMany
   {
       return $this->hasMany(Delivery_note_line::class, 'delivery_note_id');
   }

}
