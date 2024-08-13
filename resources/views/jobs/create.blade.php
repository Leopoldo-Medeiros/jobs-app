<x-layout>
    <x-slot:heading>
        Create New Job
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

            <div class="mb-4">
                <x-form-field>
                    <x-form-label for="title">Job Title</x-form-label>
                    <x-form-input name="title" id="title" placeholder="Job Title (e.g., CEO)" required />
                    <x-form-error name="title" />
                </x-form-field>
            </div>

            <div class="mb-4">
                <x-form-field>
                    <x-form-label for="company_name">Company Name</x-form-label>
                    <x-form-input name="company_name" id="company_name" placeholder="Company Name" required />
                    <x-form-error name="company_name" />
                </x-form-field>
            </div>

            <div class="mb-4">
                <x-form-field>
                    <x-form-label for="salary">Salary</x-form-label>
                    <x-form-input name="salary" id="salary" placeholder="Salary (e.g., 100000)" required />
                    <x-form-error name="salary" />
                </x-form-field>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" required placeholder="Enter job description here..."
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                <x-form-error name="description" />
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <x-form-button>Save</x-form-button>
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
