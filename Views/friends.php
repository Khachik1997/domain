<?php
if ($this->areFriends) {
    foreach ($this->friends as $friend) {
        if ($friend['avatar'] == 'NULL') {
            $friend['avatar'] = "default.jpg";
        } ?>
        <div class="userCard">
            <div class="userAvatar">
                <img src="/assets/images/avatar/<?= $friend['avatar'] ?>" alt="picture">
            </div>
            <div class="userAbout">
                <h4 class="card-title">Name:<?= $friend['name'] ?></h4>
                <p class="card-text">Email:<?= $friend['email'] ?></p>
                <a href="/account/profile/<?= $friend['id'] ?>" class="btn btn-primary">See Profile</a>
            </div>
        </div>
        <?php
    }
}else{ ?>
        <p style="text-align: center;margin-top: 20px"><?=$this->noFriends?></p>
<?php
}
?>

