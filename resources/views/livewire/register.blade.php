<div class="container mt-5" style="max-width: 400px;">
    <h1 class="mb-4 text-center">REGISTER</h1>
    <form wire:submit="save" method="post">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" wire:model="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror                
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" wire:model="password" id="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Verify Password</label>
            <input type="password" wire:model="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary w-50">REGISTER</button>
            <button type="reset" class="btn btn-danger w-50">CLEAR</button>
        </div>
    </form>
</div>