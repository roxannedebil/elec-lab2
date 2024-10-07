<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cart
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h1>Your cart is empty. <a href="{{ route('shop') }}" class="text-blue-500 hover:underline">Shop here</a></h1>
            </div>
        </div>
    </div>
</x-app-layout>