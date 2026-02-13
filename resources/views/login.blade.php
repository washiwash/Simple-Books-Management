<x-authentication>
    
    <div class="w-full max-w-md mt-8 px-6 py-8 sm:px-10 bg-[#415a77] rounded-xl shadow-xl text-white">
        <h1 class="text-2xl font-semibold text-center mb-6">Create an account</h1>
        @error('email')
        <div>{{ $message }}</div>
    @enderror

     @if (session('success'))
        <div style="color:green;">
            {{ session('success') }}

        </div>
    @endif

        <form action="{{url('/login')}}" method="POST" class="space-y-5">
            @csrf
            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-100">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full rounded-lg border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none" placeholder="name@gmail.com" required >
            </div>
         <div class="space-y-1">
        <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                <input type="password" name="password" id="password" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#394e75] focus:ring-2 focus:ring-[#394e75] outline-none"placeholder="••••••••"
                    required
                >
            </div>

            <button
                type="submit" class="mt-2 w-full rounded-lg bg-[#1b263b] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#394e75] focus:outline-none focus:ring-4 focus:ring-[#394e75]/60">
                Login
            </button>
     <p class="pt-2 text-center text-xs sm:text-sm font-light text-gray-100">
                Didn't have an account?
                <a href="{{route('register')}}" class="font-medium text-[#80a3e2] transition hover:underline underline-offset-2 hover:text-amber-50 ease-in-out">Register here</a>
            </p>
        </form>
    </div>

</x-authentication>