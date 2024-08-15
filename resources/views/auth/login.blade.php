<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <section class="bg-white-100">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-gray">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                JOBS
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 mt-[-50px]">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form method="POST" action="/jobs" class="space-y-4 md:space-y-6">
                        @csrf

                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Whoops!</strong>
                                <span class="block sm:inline">There were some problems with your input.</span>
                                <ul class="mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="space-y-12">
                            <div class="mb-4">
                                <x-form-field>
                                    <x-form-label for="email" textColor="dark:text-white">Email</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input name="email" id="email" type="email" required />
                                        <x-form-error name="email" />
                                    </div>
                                </x-form-field>
                            </div>
                            <div class="mb-4">
                                <x-form-field>
                                    <x-form-label for="password" textColor="dark:text-white">Password</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input name="password" id="password" type="password" required />
                                        <x-form-error name="password" />
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 dark:text-white">Remember me</label>
                                    </div>
                                </div>
                                <a href="#" class="text-sm font-medium dark:text-white hover:underline">Forgot password?</a>
                            </div>

                            <x-form-button>Log In</x-form-button>

                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet? <a href="../register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
