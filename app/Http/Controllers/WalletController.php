<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    // Show register page
    public function showRegister()
    {
        return view('wallet.register');
    }

    // Handle wallet registration
public function register(Request $request)
{
    $request->validate([
        'wallet_address' => 'required|string|unique:wallets|max:255',
        'user_type' => 'required|string|max:255', // removed unique
    ]);

    Wallet::create([
        'wallet_address' => $request->wallet_address,
        'user_type' => $request->user_type,
    ]);

    return redirect()->route('wallet.register')->with('success', 'Wallet registered successfully!');
}


    // Show login modal processing
    public function login(Request $request)
    {
        $request->validate([
            'wallet_address' => 'required|string|exists:wallets,wallet_address',
        ]);

        // Store wallet in session for next step
        session(['wallet_address' => $request->wallet_address]);

        return redirect()->route('wallet.generate');
    }

    // Generate 12-word mnemonic page
    public function generate()
    {
        $walletAddress = session('wallet_address');
        if (!$walletAddress) {
            return redirect()->route('wallet.register')->withErrors('Please login with your wallet first.');
        }

        $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
        shuffle($words);
        $mnemonic = implode(' ', array_slice($words, 0, 12));

        return view('wallet.generate', compact('walletAddress', 'mnemonic'));
    }


    // public function ConfirmSecretphase(){


    //      $walletAddress = session('wallet_address');
    //     if (!$walletAddress) {
    //         return redirect()->route('wallet.register')->withErrors('Please login with your wallet first.');
    //     }

    //     $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
    //     shuffle($words);
    //     $mnemonic = implode(' ', array_slice($words, 0, 12));

    //     return view('wallet.confirm_secret_phase', compact('walletAddress', 'mnemonic'));
    // }


// public function ConfirmSecretphase()
// {
//     $walletAddress = session('wallet_address');
//     if (!$walletAddress) {
//         return redirect()->route('wallet.register')->withErrors('Please login with your wallet first.');
//     }

//     // Fetch the wallet record
//     $wallet = Wallet::where('wallet_address', $walletAddress)->firstOrFail();

//     // List of all possible words
//     $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
//     shuffle($words);

//     // Take first 12 words as the mnemonic
//     $mnemonic = array_slice($words, 0, 12);

//     // Simulate incorrect selections for Word #3, #5, Word #6
//     $incorrectSelections = [
//         3 => 'endorse',  // wrong selection for Word #3
//         5 => 'brick',    // wrong selection for Word #5
//         6 => 'reduce'    // wrong selection for Word #6
//     ];

//     return view('wallet.confirm_secret_phase', compact('walletAddress', 'wallet', 'mnemonic', 'incorrectSelections'));
// }


public function ConfirmSecretphase()
{
    $walletAddress = session('wallet_address');
    if (!$walletAddress) {
        return redirect()->route('wallet.register')->withErrors('Please login with your wallet first.');
    }

    $wallet = Wallet::where('wallet_address', $walletAddress)->firstOrFail();

    // Generate 12-word mnemonic
    $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
    shuffle($words);
    $mnemonic = array_slice($words, 0, 12);

    // Incorrect selections for demonstration
    $incorrectSelections = [
        3 => 'endorse',  
        5 => 'brick',    
        6 => 'reduce'    
    ];

    // Map options for Word #3, #5, #6 (can be dynamic, here static for demo)
    $wordOptions = [];
    foreach ([3, 5, 6] as $num) {
        $wordOptions[$num] = [
            $mnemonic[$num-1],                 // correct word
            $incorrectSelections[$num],        // incorrect
            $words[array_rand($words)]         // another random word
        ];
        shuffle($wordOptions[$num]);          // randomize order
    }

    return view('wallet.confirm_secret_phase', compact('wallet', 'mnemonic', 'incorrectSelections', 'wordOptions'));
}


}
