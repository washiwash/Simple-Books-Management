<x-layout footer="Student">
 <x-slot:title>
        Student
    </x-slot:title>
<div class="px-4 py-10">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Hi, <span class="font-light">{{ auth()->user()->name ?? 'Student' }}</span></h1>
              
                <p class="mt-1 text-sm text-gray-500">Overview of your assigned books</p>
            </div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
<table class="min-w-full  text-sm text-left text-gray-700">
  <thead class="bg-gray-50">
    <tr class="hover:bg-gray-50">
      <th class="px-6 py-3 border border-gray-300 uppercase">Title</th>
      <th class="px-4 py-2 border border-gray-300 uppercase">Description</th>
      <th class="px-4 py-2 border border-gray-300 uppercase">Cover Image</th>
    </tr>
  </thead>

  <tbody class="divide-y divide-gray-100">
    @forelse(($books ?? []) as $book)
      <tr>
        <td class="border border-gray-300 hover:bg-gray-50 text-center p-5">{{ $book->title }}</td>
        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">{{ \Illuminate\Support\Str::limit($book->description, 120) }}</td>
        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">
          <img
            src="{{ asset('storage/' . $book->image) }}"
            alt="{{ $book->title }}"
            class="mx-auto h-20 w-16 object-cover rounded"
          />
        </td>
      </tr>
    @empty
      <tr>
        <td class="border border-gray-300 text-center p-5" colspan="3">No assigned books yet.</td>
      </tr>
    @endforelse

   
  </tbody>
</table>
</div>

<h1 class="text-[20px] font-semibold text-gray-500 mt-5">Total of Books: <span>{{ is_countable($books ?? null) ? count($books) : 0 }}</span></h1>



</x-layout>