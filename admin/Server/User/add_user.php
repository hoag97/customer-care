<?php 

    include_once("../../Controller/User/User_c_ajax.php");

    $user = new User_c_ajax(); 
    
        $name = trim($_POST['name']);
        $showroom = trim($_POST['showroom']);
        $address = trim($_POST['address']); 
        $email = trim($_POST['email']);
        $salary = trim($_POST['salary']);

        $num = count($user->checkEmailUser($email));

        if ($num == 0 && $name != '' && $showroom != '' && $email != '' && $address != '' && $salary != '') :

            if (filter_var($email, FILTER_VALIDATE_EMAIL)):

                $addUser = $user->addIntoUser($name, $showroom, $email, $address, $salary);

                if ($addUser !== false) :

?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Additional Success!</strong> 
                    </div>
<?php
            endif;

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)):
?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Email is Invalid!</strong> 
                    </div>                  
<?php

                endif;

            elseif ($name =='' || $showroom == '' || $email == '' || $address == '' || $salary ==''):
?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Data must not be Empty!</strong> 
            </div>
<?php
        else:
?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Staff is already exists!</strong> 
            </div>

<?php
        endif;

?>

<script type="text/javascript">
//Hiện thông báo trong 2 giây 
    $(document).ready(function(){
        $(".alert").delay(1000).slideUp();
    })
</script>
   