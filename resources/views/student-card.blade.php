@props(['student'])

<div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 border">
    <div class="text-lg font-semibold">{{ $student->full_name }}</div>
    <div class="text-sm text-gray-600">{{ $student->email }}</div>
</div>
