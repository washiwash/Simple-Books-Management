<x-authentication>
    <div class="w-full max-w-md mt-8 px-6 py-8 sm:px-10 bg-[#415a77] rounded-xl shadow-xl text-white">
        <h1 class="text-2xl font-semibold text-center mb-6">Create an account</h1>
  @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Flash success message --}}
    @if (session('success'))
        <div style="color:green;">
            {{ session('success') }}

        </div>
    @endif

        <form action="{{route('register.store')}}" method="POST" class="space-y-5">
            @csrf

             <div class="space-y-1">
                <label for="text" class="block text-sm font-medium text-gray-100">Name</label>
                <input type="text" name="name" id="name" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="John Doe" required >
            </div>
            
            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-100">Email address</label>
                <input type="email" name="email" id="email" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="name@gmail.com" required >
            </div>
         <div class="space-y-1">
        <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                <input type="password" name="password" id="password" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="••••••••"
                    required
                >
            </div>

     

            <div class="space-y-1">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-100">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none" placeholder="••••••••" required>
            </div>

            <div class="flex items-start gap-2 pt-1">
                <input id="terms" aria-describedby="terms"type="checkbox"class="mt-1 h-4 w-4 rounded border border-gray-300 bg-gray-50 text-[#003049] focus:ring-2 focus:ring-[#394e75]"required
                >
                <label for="terms" class="text-xs sm:text-sm font-light text-gray-100">
                    I accept the <a class="font-medium underline-offset-2 hover:underline text-[#1b263b]" href="#">Terms and Conditions</a>
                </label>
            </div>
            <button
                type="submit" class="mt-2 w-full rounded-lg bg-[#1b263b] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/60">
                Create account
            </button>
     <p class="pt-2 text-center text-xs sm:text-sm font-light text-gray-100">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-[#80a3e2] transition hover:underline underline-offset-2 hover:text-amber-50 ease-in-out">Login here</a>
            </p>
        </form>
    </div>

</x-authentication>