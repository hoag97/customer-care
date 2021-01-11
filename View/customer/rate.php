<?php 
	$sum_count = $count_feedback;
	$pages = ceil($sum_count / 3);
	$ido = $_GET['ido'];
 ?>
<div class="col-md-9 col-12" style="background-color: #fff; padding-left: 30px;border-radius: 0.25rem; margin: 50px 0 0px 0;float: left;height: 100%">
	<div class="title-info" style="border-bottom: 1px solid #efefef; width: 100%; height:80px;">
		<div style="margin-top: 20px;">
		<h4 style="color: #333">Đánh giá nhân viên chăm sóc</h4>
		<p>Hãy đánh giá và để lại phản hồi để chúng tôi có thể cải thiện hệ thống tốt hơn!</p>
		</div>
	</div>
	<div class="col-md-12 col-12 user2">
		<div class="user col-md-6 col-12">
			<div class="user-img text-center ui1 col-md-4 col-4">
				<img src="assets/images/users/<?php echo $user['avatar']; ?>" alt="user-image" class="" style="width: 100px;border-radius: 5px;" id='load_ava'>
			</div>
			<div class="user-info col-md-8 col-12">
				<div class="info_user">
					<div class="label_user">Tên NV</div>
					<div class="value_user"><?php echo $user['name']; ?></div>
				</div>

				<div class="info_cus1">
					<div class="label_user">Email</div>
					<div class="value_user"><?php echo $user['email']; ?></div>
				</div>

				<div class="info_cus1">
					<div class="label_user">Đánh giá</div>
					<div class="value_user" style="margin-bottom: 5px;"><div data-score="<?php echo $rating['avg'] ?>" data-score-name="user-score" id="abc"></div></div>
					<div id="rate-info" class="col-md-12">	
						(<?php echo $rating['avg']." sao / ".$rating['num'].' lượt đánh giá'; ?>)
					</div>
				</div>
			</div>
		</div>

		<div class="rate text-center col-md-6 col-12" style="float: left;">

			<?php 
				if (count($checkfb) == 1) {
			?>
				<form action="" method="POST" class="col-12">
					<div id="half" style="margin-bottom: 10px;"></div>
					<textarea rows="5" cols="50" name="feedback" id="ta"></textarea>
					<input type="hidden" name="order_id" value="<?php if(isset($_GET['ido'])){echo $_GET['ido'];} ?>">
					<br>
					<button type="submit" name="submit" value="<?php if(isset($_GET['idu'])){echo $_GET['idu'];} ?>" class="btn waves-effect waves-light btn-warning btn-rate" >Gửi</button>
				</form>
			<?php
				}else{
					echo "<div style='display: flex; align-items: center; height: 100%;'><h3 style='color: red;margin: 0 auto'>Cảm ơn quý khách đã đánh giá!</h3></div>";
				}
			 ?>
			
		</div>
	</div>
	<?php 
		foreach ($user_feedback as $key => $value) {

	?>
		<div class="col-md-12" style="display: flex;border-bottom: 1px solid #efefef; padding: 10px 10px;">
		<div class="cus-ava col-md-1 col-2" style="float: left;height: 100%">
			<?php 
				if ($value['avatar'] == 'guest.jpg') {
			?>
				<img src="assets/images/customer/<?php echo $value['avatar']; ?>" alt="user-image" class="rounded-circle" style="width: 40px; height: 40px;" id='load_ava'>
			<?php
				}else{
			?>
				<img src="assets/images/customer/<?php echo $value['idc'] ?>/<?php echo $value['avatar'] ?> ?>" alt="user-image" class="rounded-circle" style="width: 40px; height: 40px;" id='load_ava'>
			<?php
				}
			 ?>
			
		</div>
		<div class="feedback col-md-11 col-10" >
			<div><?php echo $value['name'] ?></div>
			<div style="margin-bottom: 5px;"><div data-score="<?php echo $value['rate'] ?>" data-score-name="user-score-cus" class="cus-rate"></div></div>
			<div class="cmt" style="margin-top: 20px;"><?php echo $value['feedback']; ?></div>
			<div class="time" style="margin-top: 20px;margin-bottom:10px;font-size: 13px;opacity: 0.5"><?php echo $value['time'] ?></div>
		</div>
	</div>
	<?php
		}
	 ?>
	<nav aria-label="Page navigation example" style="float: right;margin: 20px 0px;">
	  	<ul class="pagination">
	    	<li class="page-item">
	      		<a class="page-link" href="#" aria-label="Previous">
	        		<span aria-hidden="true">&laquo;</span>
	      		</a>
    		</li>
	    <?php  
	    	for ($i = 1; $i <= $pages; $i++) { 
	    ?>
				<li class="page-item <?php if($i == $_GET['pages']){ echo 'active';} ?>"><a href="index.php?page=profile&method=rate&idu=<?php echo $user['id'] ?>&ido=<?php echo $ido; ?>&pages=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
	    <?php
	    	}
	    ?>
	    
	    	<li class="page-item">
      			<a class="page-link" href="#" aria-label="Next">
        			<span aria-hidden="true">&raquo;</span>
      			</a>
    		</li>
	  	</ul>
	</nav>
	
</div>

