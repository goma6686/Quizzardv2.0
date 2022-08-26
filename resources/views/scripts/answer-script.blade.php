<script>
    $(document).ready(function(){
        var counter = 1; //nes vienas answer turi buti

        var select = document.getElementById('options');
        var value = select.options[select.selectedIndex].value;

        $("#options").change(function(){
            var value = select.options[select.selectedIndex].value;

            //jei true-false, tada palieka 1 eilute
            if (value === '1') {
                for (let i = counter; i < 5; i++) {
                    var newRow = $("<tr>");
                var cols = '';
    
                // Table columns
                cols += `<td><input class="form-control" type="text" name="answer_text[]" placeholder="Type here..." ></td>`;
                cols += `<td><input type="checkbox" name="is_correct[]"  value="${counter}" /></td>`
        
                // Insert the columns inside a row
                newRow.append(cols);
        
                // Insert the row inside a table
                $("table").append(newRow);
        
                // Increase counter after each row insertion
                counter++;
                }
                
            } else {
                while (counter > 1){
                    document.getElementById("table").deleteRow(counter);
                    counter -= 1
                }
            }
        });
    });
</script>