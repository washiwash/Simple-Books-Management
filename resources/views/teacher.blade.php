<x-admin>
     <x-slot:title>
        Teacher
     </x-slot:title>

     



     <div class="text-center">Welcome to Teacher's Site</div>
     <div class="text-center">{{ auth()->user()->name ?? 'Student' }}</div>

{{-- <table class=" w-full text-sm text-left text-gray-700">
  <thead class="bg-gray-50">
    <tr class="hover:bg-gray-50">
      <th class="px-6 py-3 border border-gray-300 uppercase ">Book Name</th>
      <th class="px-4 py-2  border border-gray-300 uppercase">Subject</th>
     <th class="px-4 py-2 border border-gray-300 uppercase">Qty</th>
    </tr>
  </thead>

  <tbody class="divide-y divide-gray-100">
    <tr>
      <td class="border border-gray-300 hover:bg-gray-50 text-center">Books About Science & Technology</td>
      <td class="border border-gray-300 text-center hover:bg-gray-50 ">Science</td>
       <td class="border border-gray-300 text-center hover:bg-gray-50">1</td>
    </tr>

   
  </tbody>
</table> --}}


     
</x-admin>