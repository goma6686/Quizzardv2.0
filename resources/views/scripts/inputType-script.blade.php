<script>
    $(document).ready(function(){
        var select = document.getElementById('options');
        var value = select.options[select.selectedIndex].value;

        /*for (let input of inputs) {
            alert( input.value + ': ' + input.checked );
        }*/

        $("#options").change(function(){
            var value = select.options[select.selectedIndex].value;

            //jei true-false, tada radio btn
            if (value === '2') {
                /*types.forEach(element => {
                    
                });*/
                $('input[type="checkbox"]').each(function() {
                    $(this).attr("type", "radio");
                });
                //$("#foo").attr("type", "checkbox");
            } else {
                $('input[type="radio"]').each(function() {
                    $(this).attr("type", "radio");
                });
            }
        });
    });
</script>