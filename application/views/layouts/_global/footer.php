			<!-- =================== end body, begin footer =================== -->
			<!--[if lt IE 9]>
					<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
			<script>
			/* Optimize loading of large javascript libraries */
			var cssPath = '<?php echo site_url();?>designs/default/styles/css/',
				jsPath = '<?php echo site_url();?>scripts/js/',
				oldIE = ((' '+document.getElementsByTagName('html')[0].className+' ').indexOf(' lt-ie9 ') > -1),
				jqVer = { oldie: '1.10.2', modern: '2.0.3' }, // old IE gets jquery 1.x, modern browsers 2.x
				bsVer = '3.0.0'; // Bootstrap version

			Modernizr.load([
				/* selectivizr for old IE (as fast as possible, for CSS) */,
				{
					test: oldIE, /* Is this old IE? */
					yep: jsPath+'vendor/selectivizr-min.js'
				},
				/* Load jquery (cdn) with fallback */
				{
					test: oldIE, /* Is this old IE? */
					yep: 'timeout=1000!//ajax.googleapis.com/ajax/libs/jquery/'+jqVer.oldie+'/jquery.min.js', /* old IE */
					nope: 'timeout=1000!//ajax.googleapis.com/ajax/libs/jquery/'+jqVer.modern+'/jquery.min.js', /* modern browser */
					callback: function(){
						if (!window.jQuery) {
							yepnope({
								test: oldIE,
								yep: jsPath+'vendor/jquery-'+jqVer.oldie+'.min.js',
								nope: jsPath+'vendor/jquery-'+jqVer.modern+'.min.js'
							});
						}
					}
				},
				/* Load bootstrap (cdn) with fallback */
				{
					load: 'timeout=1000!//netdna.bootstrapcdn.com/bootstrap/'+bsVer+'/js/bootstrap.min.js', // cdn
					complete: function(){
						if (!$.fn.modal) { /* Modal is our most often used bootstrap element */
							yepnope({
								load: [
									/* minified */
									jsPath+'vendor/bootstrap/bootstrap.min.v1.js'
								]
							});
						}
					}
				},
				/* Load compiled/other plugins, main js */
				{
					load: [
						/* --- compiled plugins */
						jsPath+'plugins.min.v1.js',
						/* --- other plugins */
						/* --- main js */
						jsPath+'main.min.v1.js'
					]
				}
			]);
			</script>

			<!-- Google Analytics: uncomment and change UA-XXXXX-X to be your site's ID. -->
			<!--script>
				(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
				function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
				e=o.createElement(i);r=o.getElementsByTagName(i)[0];
				e.src='//www.google-analytics.com/analytics.js';
				r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
				ga('create','UA-XXXXX-X');ga('send','pageview');
			</script-->
		</body>
	</html>
