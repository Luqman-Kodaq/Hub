if (jQuery().DataTable) {
    $(function () {
        $('.datatable').DataTable();

        var table = $('.datatable-exportable').DataTable();

        new $.fn.dataTable.Buttons(table, {
            'buttons': [
                {
                    extend: 'copy',
                    className: 'btn btn-xs btn-info',
                    text: '<span class="fa fa-clipboard"></span> Copy'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-xs btn-info',
                    text: '<span class="fa fa-file"></span> Export as CSV'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-xs btn-info',
                    text: '<span class="fa fa-file"></span> Export as Excel'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-xs btn-info',
                    text: '<span class="fa fa-file"></span> Export as PDF'
                },
                {
                    extend: 'print',
                    className: 'btn btn-xs btn-info',
                    text: '<span class="fa fa-print"></span> Print'
                }
            ]
        }).container().prependTo($('.box-header-buttons'));

        $('.dt-buttons').addClass('btn-group margin-r-5');
    });
}