
<div class="d-flex bd-highlight mb-3" >
    <div class="p-2 bd-highlight"><img src="/assets/images/avatar/<?= $this->user['avatar'] ?>" class="img-thumbnail" alt="..." style="display: inline-block;width: 160px;height: 160px;min-width: 160px" ></div>
    <div class="p-2 bd-highlight">
        <p> Name : <?= $this->user['name'] ?></p>
        <p style="white-space: nowrap; "> Email : <?= $this->user['email'] ?></p>
        <p style="color: red"><?= $this->uploadError ?></p>
    </div>
</div>






<?php if(!$this->friendProfile){?>
<form action="" method="POST" class="formChangeAvatar"  enctype="multipart/form-data">
    <input type="file" name="avatar" onchange="this.form.submit()" value="Change Avatar" id="changeAvatar">


        <label for="changeAvatar">Change Avatar</label>
        <?php
    }
    ?>
</form>
