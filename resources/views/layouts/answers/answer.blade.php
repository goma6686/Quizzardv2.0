<label>Answers:</label>
<div class="table-responsive">
    <table class="table border-dark">
        <thead>
            <tr>
                <th scope="col">Is Correct</th>
                <th scope="col">Answer Text</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1" value="" aria-label="..."></td>
                <td><input type="text" name="name" class="form-control" required=""></td>
                <td></td>
            </tr>
            <tr>
                <td><input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1" value="" aria-label="..."></td>
                <td><input type="text" name="name" class="form-control" required=""></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<a class="btn btn-dark" id="insertRow" href="#">Add new row</a>
<script>
    $(function () {
      
          $("#insertRow").on("click", function (event) {
              event.preventDefault();
      
              var newRow = $("<tr>");
              var cols = '';
      
              // Table columns
              cols += '<td><input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1" value="" aria-label="..."></td>'
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