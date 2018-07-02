<!-- Footer -->
<footer id = "footer">
	<div class = "row footer text-center py-5 mx-0 justify-content-center text-light">
		&copy; <?php echo Date("Y"); ?>, <a class = "js-scroll-trigger" href = "#page-top">&nbsp;Open Heaven Travels and
		                                                                                   Treks</a>
	</div>
</footer>


<script src = "<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script src = "<?php echo url_for('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/scrollreveal/scrollreveal.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src = "<?php echo url_for('javascripts/customjs.js'); ?>"></script>

</body>

</html>

<?php db_disconnect($db); ?>