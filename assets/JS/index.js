function scrollDown() {
    let element = document.querySelector(".messages");
    element.scrollTop = element.scrollHeight;
}

function AboutSentMessage(response) {
    if (!response['avatar']) {
        response['avatar'] = "default.jpg";

    }
    let src = `/assets/images/avatar/${response['avatar']}`;
    let lastMessage = "<div class='container ' id='lastMsg'>"
        +
        `<img src= ${src} alt='avatar' />`
        +
        " <p>" + response['body'] + "</p>" +
        "<span class='time-right'>" + response['date'] + " </span>" +
        "</div>";

    $('.messages').append(lastMessage);
    scrollDown()

}


// function getNewMessages (response){
//         let lastMsgId = document.querySelector(".messages div:last-child() ");
//     console.log(lastMsgId)
//
//     if( ( response['id'])){
//         if (!response['avatar']) {
//             response['avatar'] = "default.jpg";
//
//         }
//         let src = `/assets/images/avatar/${response['avatar']}`;
//         let lastMessage = "<div class='container darker''>"
//             +
//             `<img src= ${src} alt='avatar' />`
//             +
//             " <p>" + response['body'] + "</p>" +
//             "<span class='time-left'>" + response['date'] + " </span>" +
//             "</div>";
//         $('.messages').append(lastMessage);
//         scrollDown()
//     }
//
//
// }




$('#send').on('click', () => {

    let textMessage = $('#textMessage').val();
    if (textMessage.length > 0) {
        let x = $.ajax({
            url: `/account/sentMessage/${friendId}`,
            type: 'POST',
            data: {message: textMessage},
            dataType: "json",
            success: AboutSentMessage
        });
    }
    $('#textMessage').val("");

})

// setInterval(() => {
//     $.ajax({
//         url: `/account/getNewMessage/${friendId}`,
//         type: 'GET',
//         dataType: "json",
//         data: {to_id: friendId},
//         success: getNewMessages
//     });
// }, 2000)
//
//
//
