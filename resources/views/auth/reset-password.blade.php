<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" name="email" id="email"
                       value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            </div>
            @error('email')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="field">
            <label class="label">New Password<span class="has-text-danger">*</span></label>
            <div class="control">
                <input class="input" type="password" name="password" id="password" placeholder="e.g. 123&Password"
                       value="{{ old('password') }}" required autocomplete="new-password" />
                <p class="help is-info">The password must be at least 8 characters long, and contain at least 1 uppercase, 1 lowercase, 1 number, 1 symbol.</p>
            </div>
            @error('password')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="field">
            <label class="label">Confirm Password<span class="has-text-danger">*</span></label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation"
                       id="password_confirmation" autocomplete="new-password" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Reset Password</button>
            </div>
        </div>
    </form>
</x-guest-layout>
