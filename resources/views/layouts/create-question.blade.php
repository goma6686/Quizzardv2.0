<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center p-3">Create Quiz Question</h3>
                    {{ Html::ul($errors->all()) }}
                    <select id="options" >
                        <option>--</option>
                        <option value="abc">ABC</option>
                        <option value="xyz">XYZ</option>
                    </select>
                    
                    <div id="content-abc" class="content hidden">@include('layouts.question-types.simple')</div>
                    <div id="content-xyz" class="content hidden">Content2 goes here</div>
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