<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <div class="max-w-lg mx-auto mt-8">
        <form method="POST" action="/jobs" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                        <x-form-label for="first_name">First Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required />
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mb-4">
                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required />
                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mb-4">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mb-4">
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mb-4">
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password_confirmation" required />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <x-form-button>Register</x-form-button>
                </div>
            </div>

        </form>

        {{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>--}}
        {{--        <script>--}}
        {{--            var salaryInput = document.getElementById('salary');--}}
        {{--            salaryInput.addEventListener('input', function() {--}}
        {{--                var value = this.value.replace(/\D/g, ''); // Remove non-numeric characters--}}
        {{--                this.value = accounting.formatMoney(value, '$', 0); // Format as currency--}}
        {{--            });--}}
        {{--        </script>--}}
    </div>
</x-layout>
