<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Success message -->
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="flex flex-col justify-center items-center gap-4 sm:gap-x-6">
                        <h3 class="text-lg font-bold mb-4 text-center sm:text-left">Your To-Do List</h3>

                        <!-- Add new to-do form -->
                        <form method="POST" action="{{ route('todos.store') }}" class="w-full sm:w-auto">
                            @csrf
                            <div class="flex flex-col sm:flex-row gap-4 mb-4">
                                <input type="text" name="activity" placeholder="Enter activity" class="border rounded p-2 w-full sm:w-auto" required>
                                <input type="date" name="deadline" class="border rounded p-2 w-full sm:w-auto" required>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full sm:w-auto">Add</button>
                            </div>
                        </form>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <div class="mb-4 w-full sm:w-auto">
                            <form method="GET" action="{{ route('dashboard') }}">
                                <label for="filter_date" class="block text-sm font-medium mb-2">Filter by Deadline:</label>
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <input type="date" name="filter_date" id="filter_date" class="border rounded p-2 w-full sm:w-auto" value="{{ request('filter_date') }}">
                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded w-full sm:w-auto">Filter</button>
                                    <a href="{{ route('dashboard') }}" class="bg-gray-300 text-black py-2 px-4 rounded w-full sm:w-auto text-center sm:text-left">
                                        Clear Filter
                                    </a>
                                </div>
                            </form>
                        </div>

                        <div class="mb-4 flex flex-col sm:flex-row justify-end gap-x-2 w-full sm:w-auto">
                            <a href="{{ route('dashboard', ['sort' => 'asc']) }}" class="text-blue-600 text-center sm:text-left">Sort by Deadline (Ascending)</a>
                            <span class="hidden sm:block">|</span>
                            <a href="{{ route('dashboard', ['sort' => 'desc']) }}" class="text-blue-600 text-center sm:text-left">Sort by Deadline (Descending)</a>
                        </div>
                    </div>

                    <!-- Display existing to-dos -->
                    <ul>
                        @forelse($todos as $todo)
                            <div class="mb-4 p-4 bg-white rounded-lg shadow">
                                <p class="text-lg font-semibold">{{ $todo->activity }}</p>
                                <p class="text-sm text-gray-600">Deadline: {{ $todo->deadline }}</p>

                                <div class="flex space-x-2 mt-2">
                                    <a href="{{ route('todos.edit', $todo->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <li>No tasks found.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
