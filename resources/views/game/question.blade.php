<x-app-layout>
    @php session_start(); @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-20" id="app">
                    <!-- Start of quiz box -->
                    <div class="px-4 -py-3 sm:px-6 ">
                        <div class="flex max-w-auto justify-between">
                            <h1 class="text-sm leading-6 font-medium text-gray-900">
                                <span class="font-bold p-2 leading-loose bg-blue-500 text-gray rounded-lg">{{Auth::user()->name}}</span>
                                <span class="text-gray-400 font-extrabold p-1">Playing seed</span>
                                <span class="font-bold p-2 leading-loose bg-blue-500 text-gray rounded-lg">{{session('seed')}}</span>
                            </h1>
                        </div>
                    </div>
                    {{ $questions->links() }}
                        <form action="/ans" method="post">
                        @csrf 
                        @foreach ($questions as $question)
                            <input type="hidden" name="question" value="{{$question->id}}">
                            <input type="hidden" name="user" value="{{Auth::user()->id}}">
                            <div class="px-4 justify-start py-5 sm:px-6">
                                <h3 class="text-lg leading-6 mb-2 font-medium text-gray-900">
                                    <span class="mr-2 font-extrabold"> {{$question->question_text}}</span>
                                </h3>
                                    <input type="hidden" name="ans" value="0">
                                    @foreach($question->answers as $a)
                                        <div class="max-w-auto px-3 py-3 m-3 text-gray-800 rounded-lg border-2 border-gray-300 text-sm ">
                                        <input id="question{{$question->id . "-" . $a->id}}" name="ans[]" value="{{$a->is_correct}}"  type="checkbox">
                                                <label for="question-{{$a->id}}">
                                                    {{$a->answer_text}}
                                                </label>
                                        </div>
                                    @endforeach
                            @endforeach
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                    @if($questions->hasMorePages() == 1)
                                    <input type="hidden" name="next" value="{{$questions->nextPageUrl()}}">
                                    <button  type="submit" class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        {{ __('Next') }}
                                    </button>
                                    @else
                                    <input type="hidden" name="next" value="none">
                                    <button type="submit" class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        {{ __('End game') }}
                                    </button>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
