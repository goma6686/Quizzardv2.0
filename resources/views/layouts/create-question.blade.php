<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center p-3">Create Quiz Question</h3>
                    {{ Html::ul($errors->all()) }}
                    <label>Choose Type:</label>
                    <br>
                    <select name="category" id="options" >
                        <option>--</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" > {{$type->name}} </option>
                        @endforeach
                    </select>
                    
                    <!-- gal divus galima labiau dynamic, idk xd -->
                    <div id="content-1" class="content hidden"> @include('layouts.question-types.simple') </div>
                    <div id="content-2" class="content hidden"> @include('layouts.question-types.multiple-choice') </div>
                    <div id="content-3" class="content hidden"> @include('layouts.question-types.true-false') </div>
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