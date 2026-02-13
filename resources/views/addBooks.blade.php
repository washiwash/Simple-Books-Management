<x-admin>
      <x-slot:title>
        Teacher : Add Books
     </x-slot:title>



     <div class="px-4 py-10 flex flex-row justify-between">
      
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Hi, <span class="font-light">{{ auth()->user()->name ?? 'Student' }}</span> </h1>
                <p class="mt-1 text-sm text-gray-500">Overview of Books</p>

            </div>
            <div>
              <button id="openModal" type="button" class="p-3 flex flex-row gap-2 bg-[#1b263b]  text-white font-medium shadow rounded border cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
</svg>Add Books</button></div>
    
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

<div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200 ">
<table class="min-w-full  text-sm text-left text-gray-700">
  <thead class="bg-gray-50">
    <tr class="hover:bg-gray-50">
      <th class="px-6 py-3 border border-gray-300 uppercase ">Title</th>
      <th class="px-4 py-2  border border-gray-300 uppercase">Description</th>
      <th class="px-4 py-2  border border-gray-300 uppercase">Cover Image</th>
      <th class="px-4 py-2  border border-gray-300 uppercase">Action</th>
   
    </tr>
  </thead>

  <tbody class="divide-y divide-gray-100">
    @forelse (($books ?? []) as $book)
      <tr>
        <td class="border border-gray-300 hover:bg-gray-50 text-center p-5">
          {{ $book->title }}
        </td>
        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">
          {{ \Illuminate\Support\Str::limit($book->description, 120) }}
        </td>
        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">
          <img
            src="{{ asset('storage/' . $book->image) }}"
            alt="{{ $book->title }}"
            class="mx-auto h-20 w-16 object-cover rounded"
          />
        </td>
        <td class="border border-gray-300 text-center hover:bg-gray-50 p-5">
          <div class="flex items-center justify-center gap-2">
            <button
              type="button"
              class="openEditModal rounded-lg bg-[#1b263b] px-4 py-2 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/40"
              data-action="{{ route('books.update', $book) }}"
              data-title="{{ $book->title }}"
              data-image-url="{{ asset('storage/' . $book->image) }}"
            >
              Edit
            </button>

            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Delete this book?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="rounded-lg bg-[#ae2012] px-4 py-2 text-sm font-semibold text-white shadow-md transition hover:bg-[#8b1a0e] focus:outline-none focus:ring-4 focus:ring-[#ae2012]/40">
                Delete
              </button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td class="border border-gray-300 text-center p-5" colspan="4">No books yet.</td>
      </tr>
    @endforelse
  </tbody>
</table>


</div>

<div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30">
  <section role="dialog" aria-modal="true" aria-labelledby="editBookTitle" class="relative w-full max-w-md bg-white p-5 rounded-2xl shadow-md">
    <button id="closeEditModal" type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700" aria-label="Close">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>

    <form id="editBookForm" action="#" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf
      @method('PATCH')

      <div class="space-y-1">
        <label for="edit_title" class="block text-sm font-medium text-gray-500">Title</label>
        <input type="text" name="title" id="edit_title" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none" required>
      </div>

      <div class="space-y-2">
        <label for="edit_image" class="block text-sm font-medium text-gray-500">Cover Image</label>
        <img id="edit_image_preview" src="" alt="Current cover" class="h-20 w-16 object-cover rounded border border-gray-200" />
        <input type="file" name="image" id="edit_image" accept="image/*" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1b263b] file:text-white hover:file:bg-[#394e75]">
        <p class="text-xs text-gray-500">Leave empty to keep the current image.</p>
      </div>

      <button type="submit" class="mt-2 w-full rounded-lg bg-[#1b263b] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/60">
        Update
      </button>
    </form>
  </section>
</div>

<div id="addModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30">
  <section role="dialog" aria-modal="true" aria-labelledby="addTeacherTitle" class="relative w-full max-w-md bg-white p-5 rounded-2xl shadow-md">
    <button id="closeModal" type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700" aria-label="Close">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

             <div class="space-y-1">
                <label for="text" class="block text-sm font-medium text-gray-500">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none" placeholder="Infinite Powers" required>
            </div>
            
            <div class="space-y-1">
                <label for="description" class="block text-sm font-medium text-gray-500">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none" placeholder="Add Description" required>
            </div>
         <div class="space-y-1">
        <label for="image" class="block text-sm font-medium text-gray-500">Cover Image</label>
        <input type="file" name="image" id="image" accept="image/*" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1b263b] file:text-white hover:file:bg-[#394e75]" required>
            </div>
           
            <button
                type="submit" class="mt-2 w-full rounded-lg bg-[#1b263b] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/60">
                Add
            </button>
        </form>
  </section>
</div>
</x-admin>