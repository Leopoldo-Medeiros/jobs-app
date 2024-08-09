<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>

    <div class="max-w-lg mx-auto mt-8">
        <form method="POST" action="/jobs/{{ $job->id }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

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
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title:</label>
                <input type="text" name="title" id="title" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       value="{{ $job->title }}">
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salary:</label>
                <input type="text" name="salary" id="salary" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       value="{{ $job->salary }}">
            </div>

            <div class="mb-4">
                <label for="company_name" class="block text-gray-700 text-sm font-bold mb-2">Company Name:</label>
                <input type="text" name="company_name" id="company_name" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       value="{{ $job->company_name }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" required
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $job->description }}</textarea>
            </div>

            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div class="flex items-center">
                    <button type="button" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this job?')) { document.getElementById('delete-form').submit(); }" class="rounded-md bg-orange-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Delete
                    </button>
                </div>

                <div class="flex items-center justify-end gap-x-6">
                    <a href="/jobs/{{$job->id}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('jobs.destroy', $job) }}" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script>
        var salaryInput = document.getElementById('salary');

        salaryInput.addEventListener('input', function() {
            var value = this.value.replace(/\D/g, '');
            this.value = accounting.formatMoney(value, '$', 0);
        });
    </script>
</x-layout>
