<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-8 mt-10">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Login</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <p class="bg-green-100 text-green-700 text-sm p-2 rounded mb-4">
                {{ session('success') }}
            </p>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <p class="bg-red-100 text-red-700 text-sm p-2 rounded mb-4">
                {{ $errors->first() }}
            </p>
        @endif

        <form action="/login" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-gray-700 font-semibold">Email</label>
                <input type="email" name="email"
                    class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                    required>
            </div>

            <div>
                <label class="text-gray-700 font-semibold">Password</label>
                <input type="password" name="password"
                    class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                    required>
            </div>

            <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                Login
            </button>
        </form>

        <p class="text-center mt-4 text-sm">
            Belum punya akun?
            <a href="/register" class="text-blue-600 hover:underline">Register</a>
        </p>
    </div>
</x-layout>