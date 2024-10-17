<section>
    <header>
        <h2 class="h5 font-weight-bold text-dark">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="form-control" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name" 
            />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username" 
            />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-link p-0">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-weight-medium text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input 
                id="phone" 
                name="phone" 
                type="text" 
                class="form-control" 
                value="{{$detailProfile->phone ?? $user->profile->phone}}" 
                required 
                autofocus 
            />
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">{{ __('Age') }}</label>
            <input 
                id="age" 
                name="age" 
                type="text" 
                class="form-control" 
                value="{{$detailProfile->age ?? $user->profile->age}}" 
                required 
                autofocus 
            />
            @error('age')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">{{ __('Address') }}</label>
            <input 
                id="address" 
                name="address" 
                type="text" 
                class="form-control" 
                value="{{$detailProfile->address ?? $user->profile->address}}" 
                required 
                autofocus 
            />
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        
        @if (session('status') === 'profile-updated')
        <div class=" alert alert-success d-flex align-items-center mt-3" role="alert">
            {{ __('Profile updated successfully.') }}
        </div>
    @endif
        <div class="d-flex align-items-center gap-3 mt-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

           

        </div>
    </form>
</section>
