

<?php foreach ($this->friends as $friend){
     if($friend['avatar'] == 'NULL'){$friend['avatar'] = "default.jpg";} ?>
<div class="card" style="width:200px;">
    <div class="card-body">
        <h4 class="card-title">Name:<?= $friend['name'] ?></h4>
        <p class="card-text">Email:<?= $friend['email'] ?></p>
    </div>

    <img class="card-img-bottom" src="/assets/images/avatar/<?= $friend['avatar'] ?>" alt="picture" >
    <a href="/account/profile/<?= $friend['id'] ?>" class="btn btn-primary">See Profile</a>
</div>
    <?php
}
?>