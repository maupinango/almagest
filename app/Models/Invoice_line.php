<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice_line extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invoice_lines';
    protected $fillable = [
        'invoice_id',
        'delivery_lines',
        'invoice_lines_num',
        'issue_date',
        'deleted'
    ];

    public function Invoice(){
        return $this->BelongsTo(Invoice::class, 'invoice_id');
    }

    public function Delivery_note_line(){
        return $this->belongsTo(Delivery_note_line::class, 'delivery_lines_id');
    }

    public function Contain_art_invline(){
        return $this->hasMany(Contain_art_invline::class, 'invoice_line_id');
    }
}
