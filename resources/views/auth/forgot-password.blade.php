<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" name="email" id="email"
                       value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Send Email</button>
            </div>
        </div>
    </form>
</x-guest-layout>
