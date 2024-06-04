<x-guest-layout>
<div class="box">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <h1 class="title is-4">Make A New Account</h1>
            <h2 class="subtitle is-6 is-italic">
                Fields marked with a star (<span class="has-text-danger">*</span>) are required.
            </h2>

            <div class="field">
                <label class="label">Name<span class="has-text-danger">*</span></label>
                <div class="control">
                    <input class="input @error('name') is-danger @enderror"
                           type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                @error('name')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Email<span class="has-text-danger">*</span></label>
                <div class="control">
                    <input class="input @error('email') is-danger @enderror" type="email" name="email"
                           value="{{ old('email') }}" required>
                </div>
                @error('email')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Password<span class="has-text-danger">*</span></label>
                <div class="control">
                    <input class="input @error('password') is-danger @enderror" type="password" name="password"
                           required>
                </div>
                @error('password')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Confirm Password<span class="has-text-danger">*</span></label>
                <div class="control">
                    <input class="input" type="password" name="password_confirmation" required>
                </div>
            </div>

            <div class="field is-grouped">
                <a class="is-underlined has-text-black" href="{{ route('login') }}">
                    Already registered?
                </a>
                <div class="control">
                    <button type="submit" class="button is-primary">Register</button>
                </div>
                <div class="control">
                    <a type="button" href="{{ url()->previous() }}" class="button is-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
