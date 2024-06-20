<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit an answer
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                
                    <a class="text-slate-500 hover:text-slate-200" href="{{ route('subject.show', $answer->subject) }}">Back to subject</a>
                
                    <form action="{{ route('answer.update', $answer) }}" method="post">
                        @csrf
                        @method('PUT')
                        <p>
                            Published : {{ $answer->updated_at }}
                        </p>
                        <p>
                            <textarea name="content" placeholder="Your answer" label="content">{{$answer->content}}</textarea>
                        </p>
                        <input type="number" hidden name="subject_id" value="{{ $answer->subject->id }}">
                        @empty(!Auth::user())
                            <input type="number" hidden name="user_id" hidden value="{{ Auth::user()->id }}">
                        @endempty

                        <p><button class="hover:text-slate-200 text-green-500" type="submit" placeholder="Lastname">Save</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    