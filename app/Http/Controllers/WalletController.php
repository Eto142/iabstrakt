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
    // public function generate()
    // {
    //     $walletAddress = session('wallet_address');
    //     if (!$walletAddress) {
    //         return redirect()->route('wallet.register')->withErrors('Please login with your wallet first.');
    //     }

    //     $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
    //     shuffle($words);
    //     $mnemonic = implode(' ', array_slice($words, 0, 12));

    //     return view('wallet.generate', compact('walletAddress', 'mnemonic'));
    // }



    public function generate()
{
    $walletAddress = session('wallet_address');
    if (!$walletAddress) {
        return redirect()->route('wallet.generate')->withErrors('Please login with your wallet first.');
    }

    // Word list
    // $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
    $words = explode(' ', 'abandon ability able about above absent');
    shuffle($words);

    // Generate 12-word mnemonic
    $mnemonicWords = array_slice($words, 0, 6);

    // Split into two groups: User 1 = first 6, User 2 = next 6
    $user1_words = array_slice($mnemonicWords, 0, 6);
    $user2_words = array_slice($mnemonicWords, 6, 6);

    // Convert full mnemonic to string
    $mnemonic = implode(' ', $mnemonicWords);

    return view('wallet.generate', compact('walletAddress', 'mnemonic', 'user1_words', 'user2_words'));
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


public function ConfirmSecretphase()
{
    $walletAddress = session('wallet_address');
    if (!$walletAddress) {
        return redirect()->route('wallet.register')->withErrors('Please login with your wallet first.');
    }

    // Fetch the wallet record
    $wallet = Wallet::where('wallet_address', $walletAddress)->firstOrFail();

    // List of all possible words
    $words = explode(' ', 'abandon ability able about above absent absorb abstract absurd abuse access accident');
    shuffle($words);

    // Take first 12 words as the mnemonic
    $mnemonic = array_slice($words, 0, 12);

    // Simulate incorrect selections for Word #3, #5, Word #6
    $incorrectSelections = [
        3 => 'endorse',  // wrong selection for Word #3
        5 => 'brick',    // wrong selection for Word #5
        6 => 'reduce'    // wrong selection for Word #6
    ];

    return view('wallet.confirm_secret_phase', compact('walletAddress', 'wallet', 'mnemonic', 'incorrectSelections'));
}


}
