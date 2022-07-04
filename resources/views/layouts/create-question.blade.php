<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center p-3">Create Quiz Question</h3>
                    {{ Html::ul($errors->all()) }}
                        <label>
                        <input type="radio" name="colorCheckbox" value="red" checked> Simple</label>
                        <label>
                        <input type="radio" name="colorCheckbox" value="green">Multiple Choice</label>
                        <label>
                        <input type="radio" name="colorCheckbox" value="blue">True or False</label>
                        
                        <div class="form-a">
                            @include('layouts.question-types.simple')
                        </div>
                        <div class="form-b" style="display: none">
                        </div>
                        <div class="form-c" style="display: none">
                        </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('input[name=colorCheckbox]:radio').change(function(e) {
        let value = e.target.value.trim()
    
        $('[class^="form"]').css('display', 'none');
        
        switch (value) {
            case 'red':
            $('.form-a').show()
            break;
            case 'green':
            $('.form-b').show()
            break;
            case 'blue':
            $('.form-c').show()
            break;
            default:
            break;
        }
        })
    })
    </script>
</x-app-layout>