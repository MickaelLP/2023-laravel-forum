<x-guest-layout title="List of subjects">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Subjects
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-[3rem]">List of subjects</h1>
                    <p>
                        @can('create', App\Model\Subject::class)
                            <a class="hover:text-slate-200 text-green-500" href="{{ route('subject.create') }}">Create subject</a>
                        @endcan
                    </p>
                    @empty($subjects)
                        <p>{{$subjects}}No subjects found...</p>
                    @else
                        <ul>
                            @foreach ($subjects as $subject)
                                <li class="text-slate-500 hover:text-slate-200">
                                    <a href="{{ route('subject.show', $subject) }}">{{ $subject->updated_at }} {{ $subject->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
    