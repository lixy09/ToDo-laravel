<x-guest-layout>
    <div class="box">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input @error('email') is-danger @enderror" type="email" name="email"
                           value="{{ old('email') }}" required>
                </div>
                @error('email')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input @error('password') is-danger @enderror" type="password" name="password"
                           required>
                </div>
                @error('password')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="field is-grouped">
                @if (Route::has('password.request'))
                    <a class="is-underlined has-text-black" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <div class="control">
                    <button type="submit" class="button is-primary">Log in</button>
                </div>
                <div class="control">
                    <a type="button" href="{{ url()->previous() }}" class="button is-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>


