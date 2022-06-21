	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/script.js?v=1.1"></script>
	<script>
		$(document).ready( function () {
			$('#dataTable').DataTable( {
				"language": {
				"lengthMenu": "Tampilkan _MENU_ baris",
				"zeroRecords": "Maaf, data tidak ditemukan",
				"info": "Halaman _PAGE_ dari _PAGES_",
				"infoEmpty": "No records available",
				"search": "Pencarian:",
				"paginate": {
					"first":      "Pertama",
					"last":       "Terakhir",
					"next":       "Selanjutnya",
					"previous":   "Sebelumnya"
				},
				"infoFiltered": "(filtered from _MAX_ total records)"
			}});
		} );
	</script>
	</body>
</html>