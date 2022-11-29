<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
        'nama','alamat', 'no_hp','email', 'pesanan', 'lama_pinjam', 'methode_pembayaran'
    ];
}
