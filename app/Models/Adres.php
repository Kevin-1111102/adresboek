<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adres extends Model
{
    use HasFactory;

    protected $table = 'adressen';

    protected $fillable = ['naam', 'adres'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

