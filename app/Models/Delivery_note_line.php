<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery_note_line extends Model
{
    use HasFactory;

    protected $table = 'delivery_note_lines';

    protected $fillable = [
        'id',
        'delivery_note_id',
        'delivery_note_line_num',
        'order_line_id',
        'issue_date',
        'deleted'
    ];

    public function delivery_note(){
       return $this -> belongsTo(Delivery_note::class, 'delivery_note_id');
    }

    public function order_line(){
       return $this -> belongsTo(Order_line::class,'order_line_id');
    }

   public function invoice_line(){
       return $this -> hasMany(Invoice_line::class, 'delivery_lines_id');
   }

   public function contain_art_delivline(){
       return $this -> hasMany(contain_art_delivline::class, 'delivery_lines_id');
   }
}
