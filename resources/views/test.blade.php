<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
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

            <!-- Page Content -->
            Test
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
        </div>
        <script>
            $(document).ready(function(){
                var counter = 1; //nes vienas answer turi buti
    
                var select = document.getElementById('options');
                var value = select.options[select.selectedIndex].value;
    
                console.log(value)
                
                $("#insertRow").on("click", function (event) {
                    event.preventDefault();
            
                    var newRow = $("<tr>");
                    var cols = '';
            
                    // Table columns
                    cols += '<td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>'
                    cols += '<td><input class="form-control" type="text" name="name" placeholder="Type here..."></td>';
                    cols += '<td><button class="btn btn-sm btn-danger" id ="deleteRow"></button></td>';
            
                    // Insert the columns inside a row
                    newRow.append(cols);
            
                    // Insert the row inside a table
                    $("table").append(newRow);
            
                    // Increase counter after each row insertion
                    counter++;
                    if (counter === 5){
                    document.getElementById('insertRow').disabled = true;
                }
                });
                  
                // Remove row when delete btn is clicked
                $("table").on("click", "#deleteRow", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1;
                });
    
                $("#options").change(function(){
                    var value = select.options[select.selectedIndex].value;

                    //jei true-false, tada palieka 1 eilute
                    if (value === '3'){

                        while (counter > 1){
                            document.getElementById("table").deleteRow(counter);
                            counter -= 1
                        }
                        document.getElementById('insertRow').disabled = true;

                    } else { //jei simple || multi, tai max 5 answers

                        if (counter < 5){
                        document.getElementById('insertRow').disabled = false;

                    }
                    }
                });
            });
    </script>
    </body>
</html>
