<section class="chat">
    <h2>Chat Messages </h2>
    <div class="messages">

        <?php
        if (!empty($this->messages)) {

            foreach ($this->messages as $message) {

                if(!$message['avatar']){
                    $message['avatar'] = "default.jpg";
                }
                if ($message['from_id'] === $this->userId) {
                    ?>


                    <div class="container" >
                        <img src="/assets/images/avatar/<?= $message['avatar'] ?>" alt="Avatar" style="width:100%;">
                        <p><?= $message['body'] ?></p>
                        <span class="time-right"><?= $message['date'] ?></span>
                    </div>


                <?php } else { ?>


                    <div class="container darker">
                        <img src="/assets/images/avatar/<?= $message['avatar'] ?>" alt="Avatar" class="right"
                             style="width:100%;">
                        <p><?= $message['body'] ?></p>
                        <span class="time-left"><?= $message['date'] ?></span>
                    </div>


                    <?php
                }
            }
        }else{
            // NOT MESSAGE YET
            // here we need change lastMsgId ,because now is null.
            $this->messages[0]['id'] = 0;


        }
        ?>



</section>


<div class="sendMsg">
    <label for="textMessage"></label>
    <textarea name="textMessage" id="textMessage"></textarea>
    <button id = "send"><i  class="icon-play3" style="color: #449fdb"></i></button>
</div>

<script>

    let lastMsgId = <?= $this->messages[count($this->messages) - 1]['id']?> ;
    let friendId = <?= $this->friendId  ?>;
    let userAvatar = '<?= $this->user['avatar'] ?>' ;
    let sessionId = <?= $this->userId ?>;
</script>
