<section>
    <header>
        <h2 class="h5 font-weight-bold text-dark">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                autocomplete="current-password" 
                required
            />
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                autocomplete="new-password" 
                required
            />
            @error('password', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                autocomplete="new-password" 
                required
            />
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if (session('status') === 'password-updated')
            <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
                {{ __('Password updated successfully.') }}
            </div>
        @endif

        <div class="d-flex align-items-center gap-3 mt-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</section>
