<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TrustWallet - Verify Secret Phrase</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        :root {
            --trust-primary: #3375bb;
            --trust-dark: #0b0f16;
            --trust-card: #141a24;
            --trust-border: #2a3344;
            --trust-text-light: #e2e8f0;
            --trust-text-secondary: #94a3b8;
            --success-color: #10b981;
            --error-color: #ef4444;
        }
        
        body {
            background: var(--trust-dark);
            color: var(--trust-text-light);
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            padding-top: 20px;
        }

        .trust-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            margin-bottom: 30px;
        }

        .trust-logo {
            font-weight: 700;
            font-size: 22px;
            color: white;
            display: flex;
            align-items: center;
        }

        .trust-logo::before {
            content: "";
            display: inline-block;
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #3375bb, #5ba2ff);
            border-radius: 10px;
            margin-right: 10px;
        }

        .wallet-card {
            background: var(--trust-card);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--trust-border);
            height: 100%;
        }

        .user-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--trust-border);
        }

        .user-title {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .verification-badge {
            margin-left: auto;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .verified {
            background-color: rgba(16, 185, 129, 0.2);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.5);
        }

        .unverified {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--error-color);
            border: 1px solid rgba(239, 68, 68, 0.5);
        }

        .word-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 25px;
        }

        .word-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: rgba(15, 20, 28, 0.7);
            border-radius: 12px;
            border: 1px solid var(--trust-border);
        }

        .word-label {
            font-weight: 600;
            color: var(--trust-text-secondary);
            min-width: 80px;
        }

        .word-options {
            display: flex;
            gap: 10px;
        }

        .word-option {
            padding: 8px 16px;
            border-radius: 8px;
            background: rgba(42, 51, 68, 0.7);
            border: 1px solid var(--trust-border);
            color: var(--trust-text-light);
            font-size: 14px;
            cursor: default;
        }

        .word-option.selected {
            border-color: var(--trust-primary);
            background: rgba(51, 117, 187, 0.2);
        }

        .word-option.correct {
            border-color: var(--success-color);
            background: rgba(16, 185, 129, 0.2);
        }

        .word-option.incorrect {
            border-color: var(--error-color);
            background: rgba(239, 68, 68, 0.2);
        }

        .status-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .success-icon {
            background-color: var(--success-color);
        }

        .error-icon {
            background-color: var(--error-color);
        }

        .btn-primary {
            background: var(--trust-primary);
            border: none;
            font-weight: 600;
            padding: 14px;
            border-radius: 16px;
            font-size: 16px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(51, 117, 187, 0.3);
        }

        .btn-primary:hover {
            background: #2a639e;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(51, 117, 187, 0.4);
        }

        .back-button {
            color: var(--trust-text-light);
            background: none;
            border: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .back-button:hover {
            color: var(--trust-primary);
        }

        .cards-container {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="trust-header">
    <div class="trust-logo">Trust Wallet</div>
</div>

<div class="container cards-container">
    <div class="row g-4">
        <!-- User 1 - Verified -->
        <div class="col-md-6">
            <div class="wallet-card">
                <div class="user-header">
                    <h3 class="user-title">User 1 Executor</h3>
                    <div class="verification-badge verified">
                        <span class="material-icons" style="font-size: 18px;">check_circle</span>
                        Verified
                    </div>
                </div>
                
                <p class="text-center text-secondary mb-4">Secret phrase verification successful</p>
                
                <div class="word-container">
                    <!-- Word #3 -->
                    <div class="word-row">
                        <div class="word-label">Word #3</div>
                        <div class="word-options">
                            <div class="word-option correct">sorry</div>
                            <div class="word-option">endorse</div>
                            <div class="word-option">decrease</div>
                        </div>
                        <div class="status-icon success-icon">
                            <span class="material-icons" style="font-size: 16px; color: white;">check</span>
                        </div>
                    </div>
                    
                    <!-- Word #5 -->
                    <div class="word-row">
                        <div class="word-label">Word #5</div>
                        <div class="word-options">
                            <div class="word-option correct">riot</div>
                            <div class="word-option">brick</div>
                            <div class="word-option">sorry</div>
                        </div>
                        <div class="status-icon success-icon">
                            <span class="material-icons" style="font-size: 16px; color: white;">check</span>
                        </div>
                    </div>
                    
                    <!-- Word #6 -->
                    <div class="word-row">
                        <div class="word-label">Word #6</div>
                        <div class="word-options">
                            <div class="word-option correct">eager</div>
                            <div class="word-option">reduce</div>
                            <div class="word-option">endorse</div>
                        </div>
                        <div class="status-icon success-icon">
                            <span class="material-icons" style="font-size: 16px; color: white;">check</span>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button class="btn btn-primary w-100" style="color: white;">
                        <i class="material-icons" style="font-size:20px; margin-right:8px;">verified_user</i>
                        Continue to Wallet
                    </button>
                </div>
            </div>
        </div>
        
   
    <!-- User 2 - Unverified -->
    <div class="col-md-6">
        <div class="wallet-card">
            <div class="user-header">
                <h3 class="user-title">User 2 Executor</h3>
                <div class="verification-badge unverified">
                    <span class="material-icons" style="font-size: 18px;">cancel</span>
                    Unverified
                </div>
            </div>

            <p class="text-center text-secondary mb-4">Secret phrase verification failed</p>

            <div class="word-container">
                @foreach([3, 5, 6] as $index)
                    <div class="word-row">
                        <div class="word-label">Word #{{ $index }}</div>
                        <div class="word-options">
                            {{-- Correct mnemonic word --}}
                            <div class="word-option">{{ $mnemonic[$index - 1] }}</div>

                            {{-- Simulated incorrect option --}}
                            <div class="word-option incorrect">{{ $incorrectSelections[$index] }}</div>

                            {{-- Random word from mnemonic for third choice --}}
                            @php
                                $randomWord = $mnemonic[array_rand($mnemonic)];
                            @endphp
                            <div class="word-option">{{ $randomWord }}</div>
                        </div>
                        <div class="status-icon error-icon">
                            <span class="material-icons" style="font-size: 16px; color: white;">close</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-primary w-100" style="color: white;">
                    <i class="material-icons" style="font-size:20px; margin-right:8px;">refresh</i>
                    Try Again
                </button>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>