<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

  protected $fillable = [
    'wallet_address',
    'user_type',
    'mnemonic',
    'user2_words',
    'link_expires_at',
    'user_status',
];

}
