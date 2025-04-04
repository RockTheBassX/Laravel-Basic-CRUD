<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="mb-4">{{ $post->body }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded">Back to Posts</a>
                    <!-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button> -->
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>