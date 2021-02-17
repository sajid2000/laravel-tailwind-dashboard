<x-auth-layout>
    <div class="w-full lg:w-4/12 px-4">
        <x-auth-card>
            <x-slot name="header">
                <div class="text-center mb-3">
                    <h6 class="text-gray-600 text-sm font-bold">
                        {{ __('Sign in with') }}
                    </h6>
                </div>
                <div class="btn-wrapper text-center">
                    <button class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button">
                        <img alt="..." class="w-5 mr-1" src="../../assets/img/github.svg" />Github
                    </button>
                    <button class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button">
                        <img alt="..." class="w-5 mr-1" src="../../assets/img/google.svg" />Google
                    </button>
                </div>
            </x-slot>
            <div class="text-gray-500 text-center mb-3 font-bold">
                <small>{{ __('Or sign in with credentials') }}</small>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <x-form-input
                    type="email"
                    name="email"
                    :label="__('Email')"
                    :placeholder="__('Email')"
                    class="placeholder-gray-400 text-gray-700 text- w-full"
                />
                <x-form-input
                    type="password"
                    name="password"
                    :label="__('Password')"
                    :placeholder="__('Password')"
                    class="placeholder-gray-400 text-gray-700 text- w-full"
                />
                <div>
                    <label class="inline-flex items-center cursor-pointer">
                        <x-input-checkbox class="text-gray-800 w-5 h-5" name="remember" />
                        <span class="ml-2 text-sm font-semibold text-gray-700">
                            {{ __('Remember me') }}
                        </span>
                    </label>
                </div>
                <div class="text-center mt-6">
                    <x-button :title="__('Sign In')" type="submit" class="bg-purple-900 w-full py-3" />
                </div>
            </form>
        </x-auth-card>
        <div class="flex flex-wrap mt-6">
            <div class="w-1/2">
                <a href="{{ route('password.request') }}" class="text-gray-200 hover:text-gray-400 underline">
                    <small>{{ __('Forgot password?') }}</small>
                </a>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{ route('register') }}" class="text-gray-200 hover:text-gray-400 underline">
                    <small>{{ __('Create new account') }}</small>
                </a>
            </div>
        </div>
    </div>
</x-auth-layout>
