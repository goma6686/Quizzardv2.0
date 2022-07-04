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
                    <select name="category" id="options" >
                        <option>--</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" > {{$type->name}} </option>
                        @endforeach
                    </select>
                    
                    <!-- gal divus galima labiau dynamic, idk xd -->
                    <div id="content-1" class="content hidden"> @include('layouts.answers.answer') </div>
                    <div id="content-2" class="content hidden"> @include('layouts.answers.multi-answer') </div>
                    <div id="content-3" class="content hidden"> @include('layouts.answers.true-false') </div>
                    <div class="form-group pt-4">
                        <div class="col-md-2">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category" type="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" selected > {{$category->name}} </option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary text-dark">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $("#options").change(function(){
            $(".content").addClass("hidden");
            $("#content-"+$(this).val()).removeClass("hidden");
        });
    });
</script>
</x-app-layout>