<?php

if (!$this->friends) { ?>
    <p style="text-align: center;margin-top: 20px"><?= $this->noFriends ?></p>
<?php } else {
    foreach ($this->friends as $friend) {
        if (!$friend['avatar']) {
            $friend['avatar'] = "default.jpg";
        } ?>
        <div class="userCard">
            <div class="userAvatar">
                <img src="/assets/images/avatar/<?= $friend['avatar'] ?>" alt="picture">
            </div>
            <div class="userAbout">
                <p>Name:<?= $friend['name'] ?><a href="/account/chat/<?= $friend['id'] ?>"><i class="icon-mail"></i></a></p>
                <p>Email:<?= $friend['email'] ?></p>
                <a href="/account/profile/<?= $friend['id'] ?>" class="btn btn-primary">See Profile</a>
            </div>
        </div>


        <?php
    }
}
?>

