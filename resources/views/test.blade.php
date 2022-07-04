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

            <!-- Page Content -->
            <div class="card-body p-5">
                
                <!--  Bootstrap table-->
                <div class="table-responsive">
                    <table class="table border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Answer Text</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="name" class="form-control" required=""></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="name" class="form-control" required=""></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Add rows button-->
                <a class="btn btn-primary" id="insertRow" href="#">Add new row</a>
            </div>
          <script>
          $(function () {
          
              $("#insertRow").on("click", function (event) {
                  event.preventDefault();
          
                  var newRow = $("<tr>");
                  var cols = '';
          
                  // Table columns
                  cols += '<td><input class="form-control" type="text" name="name" placeholder="Type here..."></td>';
                  cols += '<td><button class="btn btn-danger" id ="deleteRow"></button</td>';
          
                  // Insert the columns inside a row
                  newRow.append(cols);
          
                  // Insert the row inside a table
                  $("table").append(newRow);
          
                  // Increase counter after each row insertion
                  counter++;
              });
          
              // Remove row when delete btn is clicked
              $("table").on("click", "#deleteRow", function (event) {
                  $(this).closest("tr").remove();
                  counter -= 1
              });
          });
          </script>
    </body>
</html>
