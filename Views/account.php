
<div class="d-flex bd-highlight mb-3" >
    <div class="p-2 bd-highlight"><img src="../assets/images/avatar/<?= $this->userAvatar ?>" class="img-thumbnail" alt="..." style="display: inline-block;width: 160px;height: 160px;" ></div>
    <div class="p-2 bd-highlight">
        <p> Name : <?= $this->userName ?></p>
        <p> Email : <?= $this->userEmail ?></p>
        <p style="color: red"><?= $this->uploadError ?></p>
    </div>
</div>
<form action="" method="POST" class="formChangeAvatar"  enctype="multipart/form-data">
    <input type="file" name="avatar" onchange="this.form.submit()" value="Change Avatar" id="changeAvatar">

    <?php if(!$this->friendProfile){?>
        <label for="changeAvatar">Change Avatar</label>
        <?php
    }
    ?>
</form>
