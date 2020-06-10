	
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/jquery.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/popper.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/tether.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/font-awesome.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/jquery.easing.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/scrolling-nav.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/isotope.pkgd.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/lity.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/slick.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/vendor/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?= base_url(); ?>authorland/assets/js/index.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123129359-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-123129359-1');
	</script>

	<!-- DataTables -->
	<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
        var table = $('table.display').DataTable({
            responsive: true,
            searching : true,
            paging:true,
            ordering: false,
            info: false
        });
</script>


</body>

<!-- Mirrored from premiumtheme.org/html/authorland/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2020 15:43:25 GMT -->
</html>