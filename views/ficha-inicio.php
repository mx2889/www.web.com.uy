<div class="cont hidden"></div>


<!-- btn fullscreen -->
<button id="btnFullscreen" type="button" class="none"></button>
<label for="btnFullscreen" class="btn-full"></label>

<!-- btn close -->
<a class="btn-close" href="<?=$lg?>/inicio"></a>


<section role="contentinfo">
	<div class="cols-12">
		
		
		<div class="cols-8">
			
			<div class="slider ficha center">
			
				<i class="prev"></i>
				<i class="next"></i>
				
				
				<div class="cols-11 f-none">
					<div class="owl-carousel">
						<div class="item"><div class="ratio-56"><img src="img/169-1.jpg"></div></div>
						<div class="item"><div class="ratio-56"><img src="img/600x800-2.jpg"></div></div>
						<div class="item"><div class="ratio-56"><img src="img/169-1.jpg"></div></div>
						<div class="item"><div class="ratio-56"><img src="img/600x800-2.jpg"></div></div>
					</div>
				</div>
				
				
			</div>
			
			
		</div>
		
		
		<div class="cols-4">
			<h2>EDIFICIOS</h2>
		</div>
		
	</div>
</section>






<script>
	function toggleFullscreen(elem) {
	  elem = elem || document.documentElement;
	  if (!document.fullscreenElement && !document.mozFullScreenElement &&
		!document.webkitFullscreenElement && !document.msFullscreenElement) {
		if (elem.requestFullscreen) {
		  elem.requestFullscreen();
		} else if (elem.msRequestFullscreen) {
		  elem.msRequestFullscreen();
		} else if (elem.mozRequestFullScreen) {
		  elem.mozRequestFullScreen();
		} else if (elem.webkitRequestFullscreen) {
		  elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
		}
	  } else {
		if (document.exitFullscreen) {
		  document.exitFullscreen();
		} else if (document.msExitFullscreen) {
		  document.msExitFullscreen();
		} else if (document.mozCancelFullScreen) {
		  document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
		  document.webkitExitFullscreen();
		}
	  }
	}

	document.getElementById('btnFullscreen').addEventListener('click', function() {
	  toggleFullscreen();
	});

	document.getElementById('exampleImage').addEventListener('click', function() {
	  toggleFullscreen(this);
	});
</script>