var pollServer = function() {
    $.get('chat.php', function(result) {
        if(!result.success) {
            console.log("Error polling server for new messages!");
            return;
        }
        $.each(result.messages, function(idx) {
            var time = new Date(this.date_created * 1000);
            var timeString = "<small>" + time.toLocaleTimeString() + "</small>";
            var chatBubbleClass = (this.sent_by == 'self') ? "bubble-sent pull-right" : "bubble-recv";
            var chatBubble = $('<div class="row ' + chatBubbleClass + '">' + this.message + timeString + '</div><div class="clearfix"></div>');
            $('#chatPanel').append(chatBubble);
        });
    });
}

$(document).ready(function() {
    setInterval(pollServer, 5000);
});

$('#chatMessage').on('keyup', function(e) {
    var buttonStatus = (e.target.value.length > 0) ? false : true;
    $('#sendMessageBtn').prop('disabled', buttonStatus);
});

$('#sendMessageBtn').on('click', function(event) {
    event.preventDefault();

    var message = $('#chatMessage').val().trim();
    if(message != ''){
        $.post('chat.php', {
            'message' : message
        }, function(result) {
            
            if(!result.success) {
                alert("There was an error sending your message");
            } else {
                pollServer();
                $('#chatMessage').val('');
            }
        });
    }
    $(this).prop('disabled', true);
});

