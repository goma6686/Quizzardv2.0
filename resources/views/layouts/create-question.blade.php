<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center p-3">Create Quiz Question</h3>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Html::ul($errors->all()) }}
                    <form enctype="multipart/form-data" method="POST" action="/create-question">
                        @csrf
                        <div class="form-group pt-4 mb-4">
                            <label>Question Text:</label>
                            <input type="text" name="question_text" class="form-control" required="">
                        </div>

                        <div class="col-md-2">
                            <label for="category">Category:</label>
                            <select class="form-control" name="category" type="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"  > {{$category->name}} </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 pt-4">
                        <label>Choose Answer Type:</label>
                        <br>
                        <select class="form-control" name="type" id="options">
                            <option selected disabled>Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type') == $type)>
                                    {{$type->name}}
                                </option>
                            @endforeach
                        </select>
                        </div>

                   <div class="form-group pt-4 mb-4">
                        <label>Answers:</label>
                        <div class="table-responsive">
                            <table id="table" class="table border-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Answer Text</th>
                                        <th scope="col">Is Correct</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button id="submit" type="submit" class="btn btn-secondary text-dark" disabled>Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('scripts.answer-script')
@include('scripts.disableBtn-script')
</x-app-layout>