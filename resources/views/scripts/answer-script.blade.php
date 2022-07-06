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
            cols += `<td><input class="form-control" type="text" name="answer_text_${counter}" placeholder="Type here..." required=""></td>`;
            cols += `<td><input type="hidden" name="is_correct_${counter}" value="0" /><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="0" name="is_correct_${counter}"></td>`
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