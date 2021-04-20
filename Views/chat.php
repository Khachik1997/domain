<section class="chat">
    <h2>Chat Messages with <?= $this->friend['name'] ?></h2>
    <div class="messages">

        <?php
        if (!empty($this->messages)) {

            foreach ($this->messages as $message) {
                if ($message['from_id'] === $this->userId) {
                    ?>


                    <div class="container">
                        <img src="/assets/images/avatar/<?= $this->user['avatar'] ?>" alt="Avatar" style="width:100%;">
                        <p><?= $message['body'] ?></p>
                        <span class="time-right"><?= $message['date'] ?></span>
                    </div>


                <?php } else { ?>


                    <div class="container darker">
                        <img src="/assets/images/avatar/<?= $this->friend['avatar'] ?>" alt="Avatar" class="right"
                             style="width:100%;">
                        <p><?= $message['body'] ?></p>
                        <span class="time-left"><?= $message['date'] ?></span>
                    </div>


                    <?php
                }
            }
        }else{?>
            <p style="color: white;text-align: center;margin-top: 20px">You don't have a messages yet</p>
        <?php

        }
        ?>


</section>


<form action="#" class="formMessage">
    <input type="text" id="forMessage">
    <label for="forMessage"><i class="icon-play3"></i></label>

</form>