<x-auth-layout>
    <div class="w-full lg:w-5/12 px-4">
        <x-auth-card>
            <x-slot name="header">
                <div class="text-center mb-3">
                    <h6 class="text-gray-600 text-sm font-bold">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </h6>
                </div>
            </x-slot>
            <form method="POST" action="{{ route('password.update') }}" class="lg:w-3/4 mx-auto">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <x-form-input
                    type="email"
                    name="email"
                    :label="__('Email')"
                    :placeholder="__('Email')"
                    :value="old('email')"
                    class="placeholder-gray-400 text-gray-700 text- w-full"
                    required
                />
                <x-form-input
                    type="password"
                    name="password"
                    :label="__('Password')"
                    :placeholder="__('Password')"
                    class="placeholder-gray-400 text-gray-700 text- w-full"
                    required
                />
                <x-form-input
                    type="password"
                    name="password_confirmation"
                    :label="__('Confirm Password')"
                    :placeholder="__('Confirm Password')"
                    class="placeholder-gray-400 text-gray-700 text- w-full"
                    required
                />
                <div class="text-center mt-6">
                    <x-button type="submit" :title="__('Reset Password')" class="bg-purple-900 w-full py-3" />
                </div>
            </form>
        </x-auth-card>
        <div class="flex flex-wrap mt-6">
            <div class="w-1/2">
                <a href="{{ route('password.request') }}" class="text-gray-200 hover:text-gray-400 underline">
                    <small>{{ __('Forgot Password?') }}</small>
                </a>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{ route('login') }}" class="text-gray-200 hover:text-gray-400 underline">
                    <small>{{ __('Already registered?') }}</small>
                </a>
            </div>
        </div>
    </div>
</x-auth-layout>
