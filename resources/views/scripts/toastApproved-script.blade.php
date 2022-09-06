<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('225ca3a5888bbcbc0ed1', {
    cluster: 'eu'
    });
    var channel = pusher.subscribe('questions');
    //var channel = pusher.subscribe('private-user.'.$this->id);

    channel.bind('App\\Events\\QuestionApproved', function(data) {
    var obj = data;
    obj.toJSON = function(){
        return {
            question_text: data.question_text
        }
    }
    const toastApproved = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastApproved)
            toast.show()
    });
    /*
    var callback = (data) => {
        const toastApproved = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastApproved)
            toast.show()
    };
    pusher.user.bind('App\\Events\\QuestionApproved', callback);*/
</script>