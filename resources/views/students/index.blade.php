@extends('layouts.app') {{-- create a basic layout if you don't have one --}}

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Students</h1>

    <div class="grid gap-4">
        @foreach($students as $student)
            <x-student-card :student="$student" />
        @endforeach
    </div>

    <div class="mt-6">
        {{ $students->links() }} {{-- pagination links if using Tailwind --}}
    </div>
</div>
@endsection
