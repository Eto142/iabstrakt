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
    $words = explode(' ', 'abandon ability able about above absent');
    shuffle($words);

    // Generate 6-word mnemonic
    $mnemonicWords = array_slice($words, 0, 6);

    // Convert to full string
    $mnemonic = implode(' ', $mnemonicWords);

    // Save to DB as user2 words
    Wallet::updateOrCreate(
        ['wallet_address' => $walletAddress],
        [
            'mnemonic'     => $mnemonic,
            'user2_words'  => $mnemonic,   // <-- save here
        ]
    );

    return view('wallet.generate', compact('walletAddress', 'mnemonic', 'mnemonicWords'));
}



// public function ConfirmSecretphase()
// {
//     $walletAddress = session('wallet_address');
//     if (!$walletAddress) {
//         return redirect()->route('wallet.login.page')->withErrors('Please login with your wallet first.');
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
        return redirect()->route('wallet.login.page')->withErrors('Please login with your wallet first.');
    }

    // Fetch saved wallet record
    $wallet = Wallet::where('wallet_address', $walletAddress)->firstOrFail();

    // Saved 6-word correct phrase
    $correctWords = explode(' ', $wallet->user2_words);

    // Shuffle for user to arrange
    $shuffledWords = $correctWords;
    shuffle($shuffledWords);

    return view('wallet.confirm_secret_phase', compact('wallet', 'correctWords', 'shuffledWords'));
}



public function ConfirmSecretphaseSubmit(Request $request)
{
    $walletAddress = session('wallet_address');

    if (!$walletAddress) {
        return redirect()->route('wallet.login.page')->withErrors('Please login with your wallet first.');
    }

    // Fetch saved wallet
    $wallet = Wallet::where('wallet_address', $walletAddress)->firstOrFail();

    // Convert saved phrase to array
    $correctWords = explode(' ', $wallet->user2_words);

    // User submitted words (array from form)
    $submittedWords = $request->input('words');

    if (!$submittedWords) {
        return redirect()->back()->withErrors('Please arrange all the words.');
    }

    // Compare arrays
    if ($submittedWords !== $correctWords) {
        return redirect()->back()->withErrors('Incorrect phrase arrangement. Please try again.');
    }

    // MARK USER AS VERIFIED
    $wallet->user_type = 'user_2_verified';
    $wallet->save();

    return redirect()->route('wallet.verified')->with('success', 'Wallet successfully verified!');
}


}
