<x-guest-layout>
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        
                        <h1>Rumah Sakit Anwar Medika</h1>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}" class="pt-3">
                        @csrf
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="form-control form-control-lg"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                            <label class="form-check-label text-muted">
                                <input type="checkbox" name="remember" class="form-check-input">{{ __('Remember me') }}</label>
                            </div>
                        </div>
                        <div class="mt-3 d-grid gap-2">
                            <x-primary-button>
                                {{ __('Log in') }}
                            </x-primary-button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</x-guest-layout>
