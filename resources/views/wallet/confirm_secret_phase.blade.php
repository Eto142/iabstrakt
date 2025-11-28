@include('home.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iabstrakt - Verify Secret Phrase</title>

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
            --warning-color: #f59e0b;
        }
        
        body {
            background: var(--trust-dark);
            color: var(--trust-text-light);
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            padding: 20px 15px;
            line-height: 1.5;
        }

        .trust-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            margin-bottom: 25px;
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
            padding: 25px 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--trust-border);
            height: 100%;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .wallet-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
        }

        .user-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--trust-border);
            flex-wrap: wrap;
            gap: 10px;
        }

        .user-title {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .verification-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: auto;
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
            flex-wrap: wrap;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .word-row:hover {
            background: rgba(15, 20, 28, 0.9);
            border-color: rgba(51, 117, 187, 0.5);
        }

        .word-label {
            font-weight: 600;
            color: var(--trust-text-secondary);
            min-width: 80px;
            flex-shrink: 0;
        }

        .word-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            flex: 1;
            justify-content: flex-end;
        }

        .word-option {
            padding: 8px 16px;
            border-radius: 8px;
            background: rgba(42, 51, 68, 0.7);
            border: 1px solid var(--trust-border);
            color: var(--trust-text-light);
            font-size: 14px;
            cursor: pointer;
            flex: 1;
            text-align: center;
            min-width: 80px;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .word-option::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s ease, height 0.3s ease;
        }

        .word-option:active::after {
            width: 100px;
            height: 100px;
        }

        .word-option:hover {
            background: rgba(42, 51, 68, 0.9);
            transform: translateY(-2px);
        }

        .word-option.selected {
            border-color: var(--trust-primary);
            background: rgba(51, 117, 187, 0.2);
            box-shadow: 0 0 0 1px var(--trust-primary);
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
            flex-shrink: 0;
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
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s ease, height 0.3s ease;
        }

        .btn-primary:active::after {
            width: 100px;
            height: 100px;
        }

        .btn-primary:hover {
            background: #2a639e;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(51, 117, 187, 0.4);
        }

        .btn-secondary {
            background: rgba(42, 51, 68, 0.7);
            border: 1px solid var(--trust-border);
            color: var(--trust-text-light);
            font-weight: 600;
            padding: 14px;
            border-radius: 16px;
            font-size: 16px;
            transition: all 0.2s ease;
            width: 100%;
        }

        .btn-secondary:hover {
            background: rgba(51, 117, 187, 0.2);
            border-color: var(--trust-primary);
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

        .success-message {
            text-align: center;
            padding: 30px 20px;
            border-radius: 16px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            margin-bottom: 25px;
            animation: fadeIn 0.5s ease;
        }

        .success-message .material-icons {
            font-size: 48px;
            color: var(--success-color);
            margin-bottom: 15px;
        }

        .progress-container {
            margin-bottom: 20px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--trust-text-secondary);
        }

        .progress-bar {
            height: 6px;
            background: rgba(42, 51, 68, 0.7);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--trust-primary);
            border-radius: 10px;
            transition: width 0.5s ease;
            width: 0%;
        }

        /* Modal Styling */
        .modal-content {
            background: var(--trust-card);
            color: var(--trust-text-light);
            border: 1px solid var(--trust-border);
            border-radius: 16px;
        }

        .modal-header {
            border-bottom: 1px solid var(--trust-border);
            padding: 20px;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid var(--trust-border);
            padding: 20px;
        }

        .download-doc {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: rgba(42, 51, 68, 0.7);
            border-radius: 12px;
            border: 1px solid var(--trust-border);
            color: var(--trust-text-light);
            text-decoration: none;
            transition: all 0.2s ease;
            margin-top: 15px;
        }

        .download-doc:hover {
            background: rgba(51, 117, 187, 0.2);
            border-color: var(--trust-primary);
            color: var(--trust-text-light);
        }

        /* Animation keyframes */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Security tips */
        .security-tips {
            background: rgba(42, 51, 68, 0.7);
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid var(--warning-color);
        }

        .security-tips h6 {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--warning-color);
            margin-bottom: 10px;
        }

        .security-tips ul {
            margin: 0;
            padding-left: 20px;
            font-size: 14px;
        }

        .security-tips li {
            margin-bottom: 5px;
            color: var(--trust-text-secondary);
        }

        /* Mobile-specific adjustments */
        @media (max-width: 575.98px) {
            body {
                padding: 15px 10px;
            }
            
            .trust-logo {
                font-size: 18px;
            }
            
            .trust-logo::before {
                width: 25px;
                height: 25px;
            }
            
            .wallet-card {
                padding: 20px 15px;
                border-radius: 20px;
            }
            
            .user-title {
                font-size: 18px;
            }
            
            .verification-badge {
                font-size: 12px;
                padding: 5px 10px;
            }
            
            .word-row {
                padding: 12px;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .word-label {
                margin-bottom: 5px;
            }
            
            .word-options {
                width: 100%;
                justify-content: space-between;
            }
            
            .word-option {
                flex: 1;
                min-width: 0;
                padding: 10px 8px;
                font-size: 13px;
            }
            
            .status-icon {
                align-self: flex-end;
                margin-top: 10px;
            }
        }

        /* Tablet adjustments */
        @media (min-width: 576px) and (max-width: 991.98px) {
            .word-option {
                min-width: 90px;
            }
        }

        /* Small desktop adjustments */
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .word-option {
                min-width: 100px;
            }
        }

        /* Center the Trust Wallet header only */
        .trust-header .trust-logo {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        /* Center all cards in this section on laptop view (>=992px) */
        @media (min-width: 992px) {
            .trust-header + .cards-container .row {
                display: flex;
                justify-content: center; /* horizontally center all columns */
            }

            .trust-header + .cards-container .col-lg-6 {
                display: flex;
                justify-content: center; /* center card in its column */
            }

            .trust-header + .cards-container .wallet-card {
                width: 100%; /* or max-width: 400px; */
                display: flex;
                flex-direction: column;
                align-items: center; /* center content inside card */
            }
        }
    </style>
</head>
<body>

<div class="trust-header">
    <div class="trust-logo">Iabstrakt</div>
</div>

<div class="container cards-container">
    <div class="row g-4">

        @if($wallet->user_type === 'user_1')
        <!-- User 1 - Verified -->
        <div class="col-12 col-lg-6">
            <div class="wallet-card">
                <div class="user-header">
                    <h3 class="user-title">User 1 Executor</h3>
                    <div class="verification-badge verified">
                        <span class="material-icons" style="font-size: 18px;">check_circle</span>
                        Verified
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
            </div>
        </div>
        @else
        
        <!-- User 2 - Unverified -->
        <div class="col-12 col-lg-6">
            <div class="wallet-card">
                <div class="user-header">
                    <h3 class="user-title">User 2 Non Participant Contributor</h3>
                    <div class="verification-badge unverified">
                        <span class="material-icons" style="font-size: 18px;">cancel</span>
                        Unverified
                    </div>
                </div>

                <p class="text-center text-secondary mb-4">Arrange the phrase in the correct order</p>

                <!-- Progress Indicator -->
                <div class="progress-container">
                    <div class="progress-label">
                        <span>Verification Progress</span>
                        <span id="progress-count">0/{{ count($shuffledWords) }}</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progress-fill"></div>
                    </div>
                </div>

                @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                <form action="{{ route('wallet.confirm_phase.submit') }}" method="POST" id="verification-form">
                    @csrf

                    <div class="word-container">

                        @foreach($shuffledWords as $index => $word)
                        <div class="word-row mb-3">
                            <div class="word-label">Word #{{ $loop->iteration }}</div>

                            <div class="word-options selectable-row" data-row="{{ $index }}">

                                @foreach($shuffledWords as $option)
                                <label class="word-option">
                                    <input type="radio" name="words[{{ $index }}]" value="{{ $option }}" hidden>
                                    <span>{{ $option }}</span>
                                </label>
                                @endforeach

                            </div>

                            <div class="status-placeholder" id="status-{{ $index }}"></div>
                        </div>
                        @endforeach

                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary" type="submit" id="verify-button">
                            <i class="material-icons" style="font-size:20px; margin-right:8px;">verified</i>
                            Verify Secret Phrase
                        </button>
                    </div>

                </form>

                <div class="security-tips">
                    <h6><span class="material-icons">security</span> Security Reminder</h6>
                    <ul>
                        <li>Make sure you're in a private, secure location</li>
                        <li>Never share your recovery phrase with anyone</li>
                        <li>Iabstrakt will never ask for your secret phrase</li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Word selection functionality
    const wordOptions = document.querySelectorAll('.word-option');
    const totalWords = {{ count($shuffledWords) }};
    let selectedCount = 0;
    
    // Update progress indicator
    function updateProgress() {
        const progressFill = document.getElementById('progress-fill');
        const progressCount = document.getElementById('progress-count');
        const percentage = (selectedCount / totalWords) * 100;
        
        progressFill.style.width = `${percentage}%`;
        progressCount.textContent = `${selectedCount}/${totalWords}`;
        
        // Change color based on progress
        if (percentage < 50) {
            progressFill.style.background = 'var(--error-color)';
        } else if (percentage < 100) {
            progressFill.style.background = 'var(--warning-color)';
        } else {
            progressFill.style.background = 'var(--success-color)';
        }
    }
    
    // Handle word selection
    wordOptions.forEach(option => {
        option.addEventListener('click', function() {
            const row = this.closest('.word-options');
            const radio = this.querySelector('input[type="radio"]');
            
            // Clear previous selection in this row
            row.querySelectorAll('.word-option').forEach(o => {
                o.classList.remove('selected');
            });
            
            // If clicking an already selected option, deselect it
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                radio.checked = false;
                selectedCount--;
            } else {
                // Select the clicked option
                this.classList.add('selected');
                radio.checked = true;
                
                // If there was no previous selection in this row, increment count
                if (!row.dataset.hasSelection) {
                    row.dataset.hasSelection = 'true';
                    selectedCount++;
                }
            }
            
            updateProgress();
        });
    });
    
    // Form submission handling
    const form = document.getElementById('verification-form');
    const verifyButton = document.getElementById('verify-button');
    
    form.addEventListener('submit', function(e) {
        if (selectedCount < totalWords) {
            e.preventDefault();
            alert(`Please select all ${totalWords} words before verifying.`);
            return;
        }
        
        // Add loading state to button
        verifyButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verifying...';
        verifyButton.disabled = true;
    });
    
    // Initialize progress
    updateProgress();
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>