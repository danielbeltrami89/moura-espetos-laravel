// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
    }
  } );
});

$(document).ready(function() {
  $('#dataTableMove').DataTable({
    "order": [[ 0, "desc" ]],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
    }
  } );
});

$(document).ready(function() {
  $('#dataTableHome').DataTable({
    "order": [[ 0, "desc" ]],
    "paging":   false,
    "ordering": false,
    "info":     false,
    "searching": false,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
    }
  } );
});