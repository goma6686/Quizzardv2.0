<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center p-3">Create Quiz Question</h3>
                    {{ Html::ul($errors->all()) }}
                    <form enctype="multipart/form-data" method="POST" action="#">
                        @csrf
                    <div class="form-group pt-4 mb-4">
                        <label>Question Text:</label>
                        <input type="text" name="title" class="form-control" required="">
                    </div>
                    <label>Choose Type:</label>
                    <br>
                    <select name="category" id="options">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected(old('type') == $type)>
                                {{$type->name}}
                            </option>
                        @endforeach
                    </select>

                   <div class="form-group pt-4 mb-4">
                    <label>Answers:</label>
                    <div class="table-responsive">
                        <table id="table" class="table border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Is Correct</th>
                                    <th scope="col">Answer Text</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                                    <td><input type="text" name="name" class="form-control" required=""></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary text-dark" id="insertRow">Add</button></div>
                    </div>
                    
                    <div class="form-group pt-4">
                        <div class="col-md-2">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category" type="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"  > {{$category->name}} </option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button id="submit" type="submit" class="btn btn-secondary text-dark">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.scripts.answer-script')
</x-app-layout>