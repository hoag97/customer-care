<?php

    include_once("../../Controller/User/User_c_ajax.php");

    $user = new User_c_ajax();

    if (isset($_POST['id'])) {

        $id = (int)$_POST['id']; 

        $removeUser = $user->removeUser($id);

        if ($removeUser) {
        ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Delete Successfully!</strong>
            </div>
        <?php
        }

    }
?>
<script type="text/javascript">
//Hiện thông báo trong 2 giây 
    $(document).ready(function(){
        $(".alert").delay(2000).slideUp();
    })
</script>
