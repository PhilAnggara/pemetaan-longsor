<script src="{{ url('frontend/vendor/jquery/jquery-3.6.0.js') }}"></script>
<script src="{{ url('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('frontend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('frontend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('frontend/vendor/aos/aos.js') }}"></script>
<script src="{{ url('frontend/vendor/fotorama/fotorama.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable( {
      language: {
        search: "",
        searchPlaceholder: "Cari...",
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
        infoFiltered: "(difilter dari _MAX_ total data)",
        paginate: {
          first:    "Pertama",
          last:     "Terakhir",
          next:     "<i class='fas fa-angle-right'></i>",
          previous: "<i class='fas fa-angle-left'></i>"
        },
      },
      // paging:  false,
      lengthChange: false,
      ordering: false,
      // searching: false,
      info: false,
      processing: true,
      pageLength:10,
    });
  });

  AOS.init({
    once: true,
    delay: 50,
    duration: 600
  });
</script>