<?php

namespace App\Models;

use App\Http\Controllers\InvoiceLineController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contain_art_delivline extends Model
{
    use HasFactory;

    protected $table = 'contain_art_delivlines';
    protected $fillable = [
        'article_id',
        'delivery_lines_id',
        'deleted'
    ];

    public function Invoice_line(){
        return $this->belongsTo(Delivery_note_line::class, 'delivery_lines_id');
    }

    public function Article(){
        return $this->belongsTo(Article::class, 'article_id');
    }
}
