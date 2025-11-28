<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

  protected $fillable = [
        'wallet_address',
        'user_type', // added this
        'mnemonic',      // <-- add this
        'user2_words',   // <-- and this
    ];
}
