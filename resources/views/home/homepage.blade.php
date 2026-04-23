<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Suspended &middot; Iabstrakt</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #0f1117;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #e2e8f0;
        }

        .card {
            background: #181d27;
            border: 1px solid #252d3d;
            border-radius: 20px;
            padding: 48px 40px 44px;
            max-width: 460px;
            width: calc(100% - 32px);
            text-align: center;
        }

        .brand {
            font-size: 1.15rem;
            font-weight: 700;
            color: #4d8fd4;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 36px;
        }

        .icon-wrap {
            width: 76px;
            height: 76px;
            background: rgba(239, 68, 68, 0.1);
            border: 1.5px solid rgba(239, 68, 68, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .icon-wrap svg {
            width: 36px;
            height: 36px;
        }

        h1 {
            font-size: 1.7rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 12px;
            letter-spacing: -0.01em;
        }

        .subtitle {
            font-size: 0.97rem;
            color: #7a91ae;
            line-height: 1.65;
            margin-bottom: 32px;
        }

        .info-box {
            background: #111520;
            border: 1px solid #232c3b;
            border-radius: 12px;
            padding: 20px 22px;
            text-align: left;
            margin-bottom: 28px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px solid #1e2636;
            font-size: 0.93rem;
        }

        .info-row:last-child { border-bottom: none; padding-bottom: 0; }
        .info-row:first-child { padding-top: 0; }

        .info-row .key { color: #607590; font-weight: 500; }
        .info-row .val { color: #c3cfe3; font-weight: 600; text-align: right; }

        .badge-review {
            background: rgba(234,179,8,0.12);
            color: #eab308;
            border: 1px solid rgba(234,179,8,0.25);
            border-radius: 20px;
            padding: 3px 11px;
            font-size: 0.82rem;
            font-weight: 600;
        }

        .btn {
            display: block;
            width: 100%;
            background: #e53e3e;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            padding: 14px;
            border-radius: 12px;
            transition: background 0.18s, transform 0.15s;
            letter-spacing: 0.01em;
        }

        .btn:hover { background: #c53030; transform: translateY(-1px); }

        .note {
            margin-top: 22px;
            font-size: 0.88rem;
            color: #4a5a72;
            line-height: 1.55;
        }

        .note a { color: #6a90be; text-decoration: none; }
        .note a:hover { text-decoration: underline; }

        /* Badge clickable */
        .badge-review {
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .badge-review:hover { opacity: 0.8; }

        /* Modal overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.65);
            backdrop-filter: blur(4px);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }
        .modal-overlay.active { display: flex; }

        .modal {
            background: #181d27;
            border: 1px solid #252d3d;
            border-radius: 18px;
            padding: 32px 28px 28px;
            max-width: 400px;
            width: calc(100% - 32px);
            position: relative;
            animation: modalIn 0.2s ease;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: translateY(12px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modal-close {
            position: absolute;
            top: 14px; right: 16px;
            background: none;
            border: none;
            color: #607590;
            font-size: 1.3rem;
            cursor: pointer;
            line-height: 1;
            padding: 4px 6px;
            border-radius: 6px;
            transition: color 0.15s, background 0.15s;
        }
        .modal-close:hover { color: #c3cfe3; background: #1e2636; }

        .modal-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 18px;
        }

        /* Under review row */
        .status-row {
            background: #111520;
            border: 1px solid #232c3b;
            border-radius: 10px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: border-color 0.15s, background 0.15s;
        }
        .status-row:hover { background: #141924; border-color: #eab30840; }

        .badge-under {
            background: rgba(234,179,8,0.12);
            color: #eab308;
            border: 1px solid rgba(234,179,8,0.25);
            border-radius: 20px;
            padding: 4px 13px;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-row .sr-label {
            color: #c3cfe3;
            font-size: 0.93rem;
            font-weight: 500;
        }

        .status-row .sr-arrow {
            margin-left: auto;
            color: #607590;
            font-size: 0.85rem;
        }

        /* Contact modal */
        .contact-note {
            font-size: 0.88rem;
            color: #607590;
            line-height: 1.6;
            margin-bottom: 20px;
            background: #111520;
            border: 1px solid #1e2636;
            border-radius: 10px;
            padding: 14px 16px;
        }

        .contact-note strong { color: #7a91ae; }

        .contact-btn {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 13px 16px;
            border-radius: 11px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 10px;
            transition: opacity 0.15s, transform 0.15s;
            border: none;
            cursor: pointer;
        }
        .contact-btn:hover { opacity: 0.88; transform: translateY(-1px); }
        .contact-btn:last-child { margin-bottom: 0; }

        .btn-support { background: #e53e3e; color: #fff; }
        .btn-email   { background: #1e2636; color: #c3cfe3; border: 1px solid #2d3a50; }
        .btn-wa      { background: #128c44; color: #fff; }

        .contact-btn svg { width: 18px; height: 18px; flex-shrink: 0; }
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">Iabstrakt</div>

        <div class="icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke="#ef4444" stroke-width="1.8"/>
                <path d="M12 7v5.5" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/>
                <circle cx="12" cy="16.5" r="1.2" fill="#ef4444"/>
            </svg>
        </div>

        <h1>Account Suspended</h1>
        <p class="subtitle">
            Your account has been suspended. Access to your account and services is currently restricted pending review.
        </p>

        <div class="info-box">
            <div class="info-row">
                <span class="key">Reason</span>
                <span class="val">Policy violation</span>
            </div>
            <div class="info-row">
                <span class="key">Date</span>
                <span class="val">Feb 27, 2026</span>
            </div>
            <div class="info-row">
                <span class="key">Status</span>
                <span class="val"><span class="badge-review" onclick="document.getElementById('statusModal').classList.add('active')">Reinstatement Status</span></span>
            </div>
        </div>

        <a href="mailto:support@iabstrakt.pro?subject=Account%20Suspension%20Appeal" class="btn">Contact Support</a>

        <p class="note">
            If you believe this is a mistake, email us and we will resolve it within <strong style="color:#7a91ae">24&ndash;48 hours</strong>.<br>
            <a href="#">Learn more about account suspensions</a>
        </p>
    </div>

    <!-- Modal 1: Reinstatement Status -->
    <div class="modal-overlay" id="statusModal" onclick="if(event.target===this)this.classList.remove('active')">
        <div class="modal">
            <button class="modal-close" onclick="document.getElementById('statusModal').classList.remove('active')">&times;</button>
            <div class="modal-title">Reinstatement Status</div>
            <div class="status-row" onclick="document.getElementById('statusModal').classList.remove('active');document.getElementById('contactModal').classList.add('active')">
                <span class="badge-under">Under Review</span>
                <span class="sr-label">Your appeal is being reviewed</span>
                <span class="sr-arrow">&#8250;</span>
            </div>
        </div>
    </div>

    <!-- Modal 2: Contact -->
    <div class="modal-overlay" id="contactModal" onclick="if(event.target===this)this.classList.remove('active')">
        <div class="modal">
            <button class="modal-close" onclick="document.getElementById('contactModal').classList.remove('active')">&times;</button>
            <div class="modal-title">Contact Support</div>

            <div class="contact-note">
                If you believe this is a mistake, email us and we will resolve it within <strong>24&ndash;48 hours</strong>.
            </div>

            <a href="mailto:support@iabstrakt.pro?subject=Account%20Suspension%20Appeal" class="contact-btn btn-support">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8l8.385 5.84a2 2 0 0 0 2.23 0L22 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Contact Support
            </a>

            <a href="mailto:support@iabstrakt.pro" class="contact-btn btn-email">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8l8.385 5.84a2 2 0 0 0 2.23 0L22 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                support@iabstrakt.pro
            </a>

            <a href="https://wa.me/15303072230" target="_blank" rel="noopener noreferrer" class="contact-btn btn-wa">
                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.112.549 4.094 1.508 5.814L0 24l6.335-1.482A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.806 9.806 0 0 1-5.001-1.371l-.36-.213-3.76.879.916-3.648-.234-.374A9.789 9.789 0 0 1 2.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/>
                </svg>
                WhatsApp
            </a>
        </div>
    </div>
</body>
</html>
