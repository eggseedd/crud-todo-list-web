<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit To-Do Item') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-6">Edit To-Do Item</h2>

        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="activity" class="block text-sm font-medium">Activity</label>
                <input type="text" name="activity" id="activity" value="{{ old('activity', $todo->activity) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('activity')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium">Deadline</label>
                <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $todo->deadline) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('deadline')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update</button>
        </form>
    </div>
</x-app-layout>
