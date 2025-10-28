<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contain_art_invline extends Model
{
    use HasFactory;

    protected $table = 'contain_art_invlines';
    protected $fillable = [
        'article_id',
        'invoice_line_id',
        'deleted'
    ];

    public function Invoice_line(){
        return $this->belongsTo(Invoice_line::class, 'invoice_line_id');
    }

    public function Article(){
        return $this->belongsTo(Contain_art_delivline::class, 'article_id');
    }
}
