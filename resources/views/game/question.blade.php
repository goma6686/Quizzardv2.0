<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-20" id="app">
                    <!-- Start of quiz box -->
                    <div class="px-4 -py-3 sm:px-6 ">
                        <div class="flex max-w-auto justify-between">
                            <h1 class="text-sm leading-6 font-medium text-gray-900">
                                <span class="text-gray-400 font-extrabold p-1">User</span>
                                <span class="font-bold p-2 leading-loose bg-blue-500 text-gray rounded-lg">{{Auth::user()->name}}</span>
                            </h1>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                <span class="text-gray-400 font-extrabold p-1">Quiz Progress </span>
                                <span class="font-bold p-3 leading-loose bg-blue-500 text-gray rounded-full">22</span>
                            </p>
                        </div>
                    </div>
                        <form> 
                            @foreach ($questions as $question)
                                <div class="px-4 justify-start py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 mb-2 font-medium text-gray-900">
                                        <span class="mr-2 font-extrabold"> {{$question->question_text}}</span>
                                    </h3>
                                    <label >
                                        @foreach($question->answers as $a)
                                            <div class="max-w-auto px-3 py-3 m-3 text-gray-800 rounded-lg border-2 border-gray-300 text-sm ">
                                                <span class="mr-2 font-extrabold"><input id="question-" value=""  type="radio"> </span> {{$a->answer_text}}
                                            </div>
                                        @endforeach
                                    </label>
                                </div>
                            @endforeach
                            <div class="flex items-center justify-end mt-4">
                                {{--@if($count < $quizSize)--}} 
                                    <button  type="submit" class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        {{ __('question') }}
                                    </button>
                                    {{-- @else  
                                    <button type="submit" @if($isDisabled) disabled='disabled' @endif class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        {{ __('Show Results') }}
                                    </button>
                                    @endif --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>