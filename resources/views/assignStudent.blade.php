<x-admin>
    <x-slot:title>
        Teacher : Assign Students
    </x-slot:title>

    <div class="px-4 py-10 flex flex-row justify-between">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Hi, <span class="font-light">{{ auth()->user()->name ?? 'Teacher' }}</span></h1>
            <p class="mt-1 text-sm text-gray-500">Overview of Students</p>
        </div>

        <div>
            <button id="openModal" type="button" class="p-3 flex flex-row gap-2 bg-[#1b263b] text-white font-medium shadow rounded border cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                </svg>
                Assign Book
            </button>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-50">
                <tr class="hover:bg-gray-50">
                    <th class="px-6 py-3 border border-gray-300 uppercase">Student</th>
                    <th class="px-4 py-2 border border-gray-300 uppercase">Email</th>
                    <th class="px-4 py-2 border border-gray-300 uppercase">Assigned Books</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse(($students ?? []) as $student)
                    <tr>
                        <td class="border border-gray-300 hover:bg-gray-50 text-center p-5">
                            {{ $student->name }}
                        </td>
                        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">
                            {{ $student->email }}
                        </td>
                        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">
                            @if (($student->books ?? collect())->count() > 0)
                                <div class="flex flex-col gap-1">
                                    @foreach ($student->books as $book)
                                        <div class="flex items-center justify-center gap-2">
                                            <span class="text-gray-800">{{ $book->title }}</span>
                                            <form action="{{ route('assignStudent.destroy') }}" method="POST" onsubmit="return confirm('Unassign this book from the student?');">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <button type="submit" class="rounded bg-[#ae2012] px-2 py-1 text-xs font-semibold text-white shadow-sm transition hover:bg-[#8b1a0e] focus:outline-none focus:ring-2 focus:ring-[#ae2012]/40">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-500">No books assigned</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border border-gray-300 text-center p-5" colspan="3">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="addModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30">
        <section role="dialog" aria-modal="true" aria-labelledby="assignBookTitle" class="relative w-full max-w-md bg-white p-5 rounded-2xl shadow-md">
            <button id="closeModal" type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <form action="{{ route('assignStudent.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="space-y-1">
                    <label for="user_id" class="block text-sm font-medium text-gray-500">Student</label>
                    <select name="user_id" id="user_id" required class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none">
                        <option value="" disabled selected>Select a student</option>
                        @foreach (($students ?? []) as $student)
                            <option value="{{ $student->id }}" @selected((string) old('user_id') === (string) $student->id)>
                                {{ $student->name }} ({{ $student->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <label for="book_id" class="block text-sm font-medium text-gray-500">Book</label>
                    <select name="book_id" id="book_id" required class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none">
                        <option value="" disabled selected>Select a book</option>
                        @foreach (($books ?? []) as $book)
                            <option value="{{ $book->id }}" @selected((string) old('book_id') === (string) $book->id)>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="mt-2 w-full rounded-lg bg-[#1b263b] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/60">
                    Assign
                </button>
            </form>
        </section>
    </div>
</x-admin>