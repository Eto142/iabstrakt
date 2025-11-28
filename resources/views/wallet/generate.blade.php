@include('home.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TrustWallet - 12-Word Mnemonic</title>

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
            padding-top: 20px;
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
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--trust-border);
            max-width: 500px;
            margin: 0 auto;
        }

        .wallet-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--trust-primary), #5ba2ff);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .wallet-icon i {
            font-size: 40px;
            color: white;
        }

        .key-box {
            background: rgba(15, 20, 28, 0.7);
            padding: 20px;
            border-radius: 16px;
            border: 1px solid var(--trust-border);
            font-family: monospace;
            font-size: 18px;
            line-height: 1.8;
            text-align: center;
            position: relative;
        }

        .copy-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            background: var(--trust-primary);
            border: none;
            padding: 6px 8px;
            border-radius: 8px;
            cursor: pointer;
            color: #fff;
            display: flex;
            align-items: center;
            transition: 0.2s ease;
        }

        .copy-btn:hover {
            background: #285d94;
        }

        /* Toast like TrustWallet */
        .toast-message {
            position: fixed;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--trust-primary);
            padding: 14px 22px;
            border-radius: 20px;
            color: white;
            font-weight: 600;
            opacity: 0;
            transition: all 0.4s ease;
            z-index: 9999;
        }

        .toast-show {
            bottom: 30px;
            opacity: 1;
        }

        .btn-primary {
            background: var(--trust-primary);
            border: none;
            font-weight: 600;
            padding: 14px 24px;
            border-radius: 16px;
            font-size: 16px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(51, 117, 187, 0.3);
        }

        .btn-primary:hover {
            background: #2a639e;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="trust-header">
    <div class="trust-logo">Iabstrakt</div>
</div>

<div class="container mt-5">
    <div class="wallet-card">

        <div class="wallet-icon">
            <i class="material-icons">vpn_key</i>
        </div>

        <h3 class="text-center mb-3">Your 12-Word Mnemonic Phrase</h3>
        <p class="text-center text-secondary">Keep it safe. This is your wallet recovery phrase.</p>

        <div class="key-box mt-4" id="mnemonicBox">
            {{ $mnemonic }}

            <button class="copy-btn" onclick="copyMnemonic()">
                <i class="material-icons" style="font-size:18px;">content_copy</i>
            </button>
        </div>

        <div class="text-center mt-4">
           <a href="{{route('confirm.secretphase') }}" class="btn btn-primary" style="color: white;">
    <i class="material-icons" style="font-size:20px; margin-right:8px;">key</i>
    Activate keys
</a>

        </div>
    </div>
</div>

<!-- Toast Message -->
<div id="toast" class="toast-message">Copied to clipboard</div>

<script>
function copyMnemonic() {
    const text = document.getElementById("mnemonicBox").innerText.trim();

    navigator.clipboard.writeText(text).then(() => {
        showToast();
    });
}

function showToast() {
    const toast = document.getElementById("toast");
    toast.classList.add("toast-show");

    setTimeout(() => {
        toast.classList.remove("toast-show");
    }, 2000);
}
</script>

</body>
</html>
