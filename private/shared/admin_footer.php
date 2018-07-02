<footer id = "main-footer" class = "bg-dark text-white mt-5 p-5">
	<div class = "conatiner">
		<div class = "row">
			<div class = "col">
				<p class = "lead text-center">&copy; <?php echo Date("Y"); ?>,
					<a class = "js-scroll-trigger" href = "http://www.openheaventravels.com" target = "_blank">Open Heaven
					                                                                                           Travels and
					                                                                                           Treks</a></p>
			</div>
		</div>
	</div>
</footer>


<script src = "<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src = "<?php echo url_for('javascripts/customjs.js'); ?>"></script>

</body>

</html>

<?php db_disconnect($db); ?>