<script>
    $(document).ready(function(){
        var select = document.getElementById('options');
        var value = select.options[select.selectedIndex].value;

        var counter = (document.getElementById("table").rows.length)-1; //nes pirmas row yra pavadinimai

        $("#options").change(function(){
            deleteRows();
            var value = select.options[select.selectedIndex].value;

            //jei true-false, tada palieka 1 eilute
            if (value === '2') {
                addRows(2);
                $('input[type="checkbox"]').each(function() {
                    $(this).attr("type", "radio");
                });
                $('table input[type="text"]').eq(0).attr('value', 'TRUE');
                $('table input[type="text"]').eq(1).attr('value', 'FALSE');
                $('table input[type="radio"]').get(0).checked = true;
            } else {
                addRows(5);
            }
        });

        function deleteRows(){
            while (counter > 0){
                document.getElementById("table").deleteRow(counter);
                counter -= 1
            }
        }

        function addRows(x) {
            for (let i = counter; i < x; i++) {
                var newRow = $("<tr>");
                var cols = '';
    
                // Table columns
                if(counter < 2){
                    cols += `<td><input class="form-control" type="text" name="answer_text[]" value="" placeholder="Type here..." required></td>`;
                } else {
                    cols += `<td><input class="form-control" type="text" name="answer_text[]" value="" placeholder="Type here..." ></td>`;
                }
                cols += `<td><input type="checkbox" name="is_correct[]"  value="${counter}" /></td>`
        
                // Insert the columns inside a row
                newRow.append(cols);
        
                // Insert the row inside a table
                $("table").append(newRow);
        
                // Increase counter after each row insertion
                counter++;
            }
        }

    });
</script>