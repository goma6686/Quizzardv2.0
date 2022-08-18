<script>
    $(document).ready(function(){
        var counter = 1; //nes vienas answer turi buti

        var select = document.getElementById('options');
        var value = select.options[select.selectedIndex].value;
        
        $("#insertRow").on("click", function (event) {
            event.preventDefault();
            if(counter > 1){
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
    
            var newRow = $("<tr>");
            var cols = '';
    
            // Table columns
            cols += `<td><input class="form-control" type="text" name="answer_text[]" placeholder="Type here..." required=""></td>`;
            cols += `<td><input type="hidden" name="is_correct[]" value="0" /><input type="checkbox" name="is_correct[]"  value="1" "></td>`
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

            if(counter >= 2){
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        });

        $("#options").change(function(){
            var value = select.options[select.selectedIndex].value;
            document.getElementById('submit').disabled = true;

            //jei true-false, tada palieka 1 eilute
            if (value === '3'){

                while (counter > 1){
                    document.getElementById("table").deleteRow(counter);
                    counter -= 1
                }
                document.getElementById('insertRow').disabled = true;
                document.getElementById('submit').disabled = false; //leist siust 1 answr, nes true-false

            } else { //jei simple || multi, tai max 5 answers
                if (counter < 5){
                document.getElementById('insertRow').disabled = false;

            }
            }
        });
    });
</script>