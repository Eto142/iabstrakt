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
                <span class="val"><span class="badge-review">Under Review</span></span>
            </div>
        </div>

        <a href="mailto:support@iabstrakt.com?subject=Account%20Suspension%20Appeal" class="btn">Contact Support</a>

        <p class="note">
            If you believe this is a mistake, email us and we will resolve it within <strong style="color:#7a91ae">24&ndash;48 hours</strong>.<br>
            <a href="#">Learn more about account suspensions</a>
        </p>
    </div>
</body>
</html>
