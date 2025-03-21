<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('posts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Post</a>
                    @if (session('success'))
                        <div class="text-green-600 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @forelse ($posts as $post)
                        <div class="mb-4 p-4 border-b">
                            <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                            <p>{{ $post->body }}</p>
                            <div class="mt-2">
                                <a href="{{ route('posts.show', $post) }}" class="text-blue-500">View</a>
                                <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 ml-4">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>No posts found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>