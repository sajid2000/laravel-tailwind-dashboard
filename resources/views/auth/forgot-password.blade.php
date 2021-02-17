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
            <form method="POST" action="{{ route('password.email') }}" class="lg:w-3/4 mx-auto">
                @csrf
                <x-form-input
                    type="email"
                    name="email"
                    :label="__('Email')"
                    :placeholder="__('Email')"
                    class="placeholder-gray-400 text-gray-700 text- w-full"
                />
                <div class="text-center mt-6">
                    <x-button
                        type="submit"
                        :title="__('Email Password Reset Link')"
                        class="bg-purple-900 w-full py-3"
                    />
                </div>
            </form>
        </x-auth-card>
        <div class="flex flex-wrap mt-6">
            <div class="w-1/2">
                <a href="{{ route('register') }}" class="text-gray-200 hover:text-gray-400 underline">
                    <small>{{ __('Create new account') }}</small>
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
