<!DOCTYPE html>
<html lang="en">
<head>
	<? include 'top.htm'; ?>

	<link rel="stylesheet" href="http://www.wzhouhui.egocdn.com/temp/skin1/dist/mincss/other_min.css?2015080703">
</head>
<body>
	<header id="header">
		<? include 'public_top.htm'; ?>
	</header>

	<!-- 注册成功msg页面 -->
	<div class="js_mainBgWrap">
		<div class="reg-success-msg-main success-msg-main w1200">
			<!-- success:表示成功 -->
			<div class="reg-success-msg success-msg pr">
				<i class="msg-status success-icon48 pa"></i>
				<div class="msg-content">
					<p class="con-tit">恭喜你，注册成功！</p>
					<p class="con-other">您获得的100元优惠券已发至你的账户</p>
				</div>
			</div><!-- .reg-success-msg -->

			<p class="btn-wrap clearfix">
				<a href="#">查看我的优惠券</a>
				<a href="#" class="color-main">立即使用</a>
			</p>

			<p class="banner"><img src="../dist/images/domeimg/lazyload1.gif" width="1000" height="600" data-original="../dist/images/domeimg/login/reg_success_banner.jpg" alt=""></p>
		</div><!-- .reg-success-msg-main -->
	</div><!-- .js_mainBgWrap -->


	<footer id="footer" class="footer-bgf3">
		<? include 'foot.php'; ?>
	</footer><!--end #footer -->

	<script>
		$LAB.script("")
			.wait(function(){

			})	
	</script>

</body>
</html>