
function scrollDown() {
    let element = document.querySelector(".messages");
    element.scrollTop = element.scrollHeight;
}

window.onload = scrollDown;


$('#send').on('click', () => {
    let textMessage = $('#textMessage').val();
    if (textMessage.length > 0) {
        let x = $.ajax({
            url: `/account/sendMessage/${friendId}`,
            type: 'POST',
            data: {message: textMessage},
            dataType: "json",
            success: function printMsg(response) {
                if (response["success"]) {
                    let src = `/assets/images/avatar/${userAvatar}`;
                    let lastMessage = "<div class='container ' id='lastMsg'>"
                        +
                        `<img src= ${src} alt='avatar' />`
                        +
                        " <p>" + textMessage + "</p>" +
                        "<span class='time-right'>" + response["date"] + " </span>" +
                        "</div>";
                    lastMsgId++;
                    $('.messages').append(lastMessage);
                    scrollDown()
                }


            }
        });
    }
    $('#textMessage').val("");

})


setInterval(() => {

    $.ajax({
        url: `/account/getMessage/${friendId}/${lastMsgId}/`,
        type: 'GET',
        dataType: "json",
        success: function getMessages(response) {
            if (response.length > 0) {
                lastMsgId = response[response.length - 1]['id'];
                response.forEach((response) => {
                    if(response["from_id"] !== sessionId ){
                        if (!response['avatar']) {
                            response['avatar'] = "default.jpg";
                        }
                        let src = `/assets/images/avatar/${response['avatar']}`;
                        let lastMessage = "<div class='container darker''>"
                            +
                            `<img src= ${src} alt='avatar' />`
                            +
                            " <p>" + response['body'] + "</p>" +
                            "<span class='time-left'>" + response['date'] + " </span>" +
                            "</div>";
                        $('.messages').append(lastMessage);
                        scrollDown();
                    }
                })
            }
        }
    });

}, 2000)



