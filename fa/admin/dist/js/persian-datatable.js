$(function () {
    $('#kt_table').DataTable({
        "language": {
            "emptyTable": "هیچ داده‌ای در جدول وجود ندارد",
            "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
            "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",
            "infoFiltered": "(فیلتر شده از _MAX_ ردیف)",
            "infoThousands": ",",
            "lengthMenu": "نمایش _MENU_ ردیف",
            "processing": "در حال پردازش...",
            "search": "جستجو:",
            "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });