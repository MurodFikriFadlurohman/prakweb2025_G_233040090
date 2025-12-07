<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-8 mt-10">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Register</h2>

        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-gray-700 font-semibold">Nama</label>
                <input type="text" name="name"
                    class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                    required>
            </div>

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

            <div>
                <label class="text-gray-700 font-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                    required>
            </div>

            <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                Register
            </button>
        </form>

        <p class="text-center mt-4 text-sm">
            Sudah punya akun?
            <a href="/login" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</x-layout>