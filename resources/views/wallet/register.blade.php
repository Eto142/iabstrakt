
<div class="container mt-5">
    <div class="wallet-card">
        <h3 class="text-center mb-3">Register Your Wallet</h3>
        <p class="text-center text-secondary">Enter your tagged wallet address to register</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('wallet.register.post') }}" method="POST">
            @csrf
            <input type="text" name="wallet_address" class="form-control mb-3" placeholder="0x..." required>
            @error('wallet_address')
                <span class="text-danger small">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary w-100">
                <i class="material-icons">save</i> Register Wallet
            </button>
        </form>
    </div>
</div>

