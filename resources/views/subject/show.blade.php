<x-guest-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of a subject
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('subject.index') }}">Back to subjects</a></p>
                    <dl>
                        <dt class="text-[2rem]">Title</dt>
                        <dd>{{ $subject->title }}</dd>
                        <p>Published : {{ $subject->created_at }}</p>
                        <dt class="text-[2rem]">Question</dt>
                        <dd>{{ $subject->question }}</dd>
                    </dl>
                    @if ($subject->answers->isNotEmpty())
                    <div class="space-y-2">

                        @foreach ($subject->answers as $answer)

                        
                            <ul class="bg-gray-300">

                                @empty($answer->user_id)
                                    <p>{{$answer->created_at}} - Anonymous</p>
                                @else
                                    @empty(!Auth::user())
                                        @if($answer->user_id == Auth::user()->id)
                                            <p><a class="hover:text-slate-200 text-green-500" href="{{ route('answer.edit', $answer) }}">Edit</a></p>
                                        @endif
                                    @endempty
                                    <p>{{$answer->updated_at}} @if($answer->created_at != $answer->updated_at) (edited : {{$answer->updated_at}}  @endif) - {{ $answer->user->name }}</p>
                                @endempty
                                <p>{{$answer->content}}</p>
                            </ul>


                        @endforeach
                    </div>
                    @endif
                    <div>
                        <form action="{{ route('answer.store') }}" method="post">
                            @csrf
                            <p>
                                
                                <textarea placeholder="Your answer" name="content" value="{{ old('content') }}"></textarea>
                                @error('title')  
                                    <br>{{$message}}
                                @enderror

                                <input type="number" hidden name="subject_id" value="{{ $subject->id }}">

                                @empty(!Auth::user())
                                    <input type="number" hidden name="user_id" hidden value="{{ Auth::user()->id }}">
                                @endempty
                                
                            </p>
                            <p><button class="hover:text-slate-200 text-green-500 border rounded p-3" type="submit">Answer !</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
    