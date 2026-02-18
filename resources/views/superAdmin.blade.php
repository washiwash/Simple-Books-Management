<x-layout footer="Super Admin">
     <x-slot:title>
        Super Admin
    </x-slot:title>
    <div class="px-4 py-10 flex flex-row justify-between">
      
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Hi, <span class="font-light">{{ auth()->user()->name ?? 'Student' }}</span> </h1>
                <p class="mt-1 text-sm text-gray-500">Overview of Teachers</p>

            </div>
            <div>
              <button id="openModal" type="button" class="p-3 flex flex-row gap-2 bg-[#1b263b]  text-white font-medium shadow rounded border cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
</svg>Add Teacher</button></div>
    
    </div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200 ">
<table class="min-w-full  text-sm text-left text-gray-700">
  <thead class="bg-gray-50">
    <tr class="hover:bg-gray-50">
      <th class="px-6 py-3 border border-gray-300 uppercase ">Teacher's Name</th>
      <th class="px-4 py-2  border border-gray-300 uppercase">Email</th>
   
    </tr>
  </thead>

  <tbody class="divide-y divide-gray-100">
  @php $adminList = collect($admins ?? []); @endphp
   @foreach($adminList as $admin)
    <tr class="">
      <td class="border border-gray-300 hover:bg-gray-50 text-center p-5">{{ $admin->username ?? $admin->name }}</td>
      <td class="border border-gray-300 text-center hover:bg-gray-50 ">{{ $admin->email }}</td>
    </tr>
     @endforeach

   
  </tbody>
</table>


</div>

<div id="addModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30">
  <section role="dialog" aria-modal="true" aria-labelledby="addTeacherTitle" class="relative w-full max-w-md bg-white p-5 rounded-2xl shadow-md">
    <button id="closeModal" type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700" aria-label="Close">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>

    <h2 id="addTeacherTitle" class="text-lg font-semibold text-gray-900 mb-4">Add Teacher</h2>
  <form action="{{route('register.store')}}" method="POST" class="space-y-5">
            @csrf

             <div class="space-y-1">
                <label for="text" class="block text-sm font-medium text-gray-500">Name</label>
                <input type="text" name="name" id="name" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="John Doe" required >
            </div>
            
            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-500">Email address</label>
                <input type="email" name="email" id="email" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="name@gmail.com" required >
            </div>
         <div class="space-y-1">
        <label for="password" class="block text-sm font-medium text-gray-500">Password</label>
                <input type="password" name="password" id="password" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="••••••••"
                    required
                >
            </div>

     

            <div class="space-y-1">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-500">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none" placeholder="••••••••" required>
            </div>

           
            <button
                type="submit" class="mt-2 w-full rounded-lg bg-[#1b263b] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/60">
                Create account
            </button>
            <input type="hidden" name="role" value="admin">
        </form>
</section>
</div>

</x-layout>