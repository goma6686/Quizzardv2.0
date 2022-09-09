<script>
    Pusher.logToConsole = true;
    
    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        auth: {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        }
    });

    //var channel = pusher.subscribe('questions');
    var channel = pusher.subscribe(`App.Models.User.${this.id}`);
    
    /*Echo.private(`private-user.${this.id}`).listen('App\\Events\\QuestionApproved', (e) => {
        const toastApproved = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastApproved)
        toast.show();
    });*/
    

    channel.bind('App\\Events\\QuestionApproved', function(data) {
        const toastApproved = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastApproved)
            toast.show()
    });


</script>