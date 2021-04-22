
function scrollDown(){
    let element = document.querySelector(".messages");
    element.scrollTop = element.scrollHeight - element.clientHeight;
}

    function  successFunction (response){
        if(!response['avatar']){
            response['avatar'] = "default.jpg" ;

        }
        let src =`/assets/images/avatar/${response['avatar']}`;
        let lastMessage = "<div class='container ' id='lastMsg'>"
            +
            `<img src= ${src} alt='avatar' />`
            +
            " <p>"+ response['body'] +"</p>" +
            "<span class='time-right'>" + response['date'] + " </span>" +
            "</div>";

        $('.messages').append(lastMessage);

    }

$('#send').on('click',()=>{

    let textMessage = $('#textMessage').val();
    if(textMessage.length > 0){
        let x = $.ajax({
            url:`/account/sentMessage/${friendId}`,
            type: 'POST',
            data:{ message:textMessage},
            dataType: "json",
            success: successFunction
        });
    }
    scrollDown()
    $('#textMessage').val("");

})



    setInterval(function (){
        document.location.reload();
    },2000);


