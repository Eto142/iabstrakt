<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TrustWallet - Register Wallet</title>

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
        }
        
        body {
            background: var(--trust-dark);
            color: var(--trust-text-light);
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            padding-top: 30px;
        }

        .trust-header {
            display: flex;
            align-items: center;
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
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #3375bb, #5ba2ff);
            border-radius: 10px;
            margin-right: 10px;
        }

        .wallet-card {
            background: var(--trust-card);
            border-radius: 24px;
            padding: 40px 30px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.5);
            border: 1px solid var(--trust-border);
            max-width: 500px;
            margin: 0 auto;
        }

        .wallet-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--trust-primary), #5ba2ff);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .wallet-icon i {
            font-size: 42px;
            color: white;
        }

        .form-control {
            background: rgba(15, 20, 28, 0.7);
            border: 1px solid var(--trust-border);
            color: var(--trust-text-light);
            padding: 14px 16px;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(51, 117, 187, 0.2);
            border-color: var(--trust-primary);
            background: rgba(15, 20, 28, 0.9);
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
        }

        .alert-success {
            background: rgba(50, 205, 50, 0.1);
            color: #32cd32;
            border: 1px solid #32cd32;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 15px;
            text-align: center;
        }

        .text-secondary {
            color: var(--trust-text-secondary);
        }

        h3 {
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="trust-header">
    <div class="trust-logo">Trust Wallet</div>
</div>

<div class="container mt-5">
    <div class="wallet-card">

        <div class="wallet-icon">
            <i class="material-icons">account_balance_wallet</i>
        </div>

        <h3 class="text-center mb-3">Register Your Wallet</h3>
        <p class="text-center text-secondary mb-4">Enter your tagged wallet address to register</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('wallet.register.post') }}" method="POST">
            @csrf
            <input type="text" name="wallet_address" class="form-control mb-3" placeholder="0x..." required>
            @error('wallet_address')
                <span class="text-danger small">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary w-100 mt-2">
                <i class="material-icons" style="font-size:20px; margin-right:6px;">save</i>
                Register Wallet
            </button>
        </form>
    </div>
</div>

</body>
</html>
