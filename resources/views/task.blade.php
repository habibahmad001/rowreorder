<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/ico" href="https://www.datatables.net/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editor example - Row reordering</title>
    <link rel="stylesheet" type="text/css" href="./resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="./resources/demo.css">
    <style type="text/css" class="init">

    </style>
    <script type="text/javascript" language="javascript" src="./resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="./resources/demo.js"></script>
    <script type="text/javascript" language="javascript" src="./resources/editor-demo.js"></script>
    <script defer class="init">
        dt_demo.init({
            libs: {
                js: [
                    "jquery", "datatables", "buttons", "select", "datetime", "rowreorder", "editor"
                ],
                css: [
                    "datatables", "buttons", "select", "datetime", "rowreorder", "editor"
                ],
                components: {
                    datatables: {
                        css: "https://cdn.datatables.net/2.0.2/css",
                        js: "https://cdn.datatables.net/2.0.2/js",
                        resolve: true
                    },
                    autofill: {
                        css: "https://cdn.datatables.net/autofill/2.7.0/css",
                        js: "https://cdn.datatables.net/autofill/2.7.0/js",
                        resolve: true
                    },
                    buttons: {
                        css: "https://cdn.datatables.net/buttons/3.0.1/css",
                        js: "https://cdn.datatables.net/buttons/3.0.1/js",
                        resolve: true
                    },
                    colreorder: {
                        css: "https://cdn.datatables.net/colreorder/2.0.0/css",
                        js: "https://cdn.datatables.net/colreorder/2.0.0/js",
                        resolve: true
                    },
                    editor: {
                        css: "./css",
                        js: "./js",
                        resolve: true
                    },
                    fixedcolumns: {
                        css: "https://cdn.datatables.net/fixedcolumns/5.0.0/css",
                        js: "https://cdn.datatables.net/fixedcolumns/5.0.0/js",
                        resolve: true
                    },
                    fixedheader: {
                        css: "https://cdn.datatables.net/fixedheader/4.0.1/css",
                        js: "https://cdn.datatables.net/fixedheader/4.0.1/js",
                        resolve: true
                    },
                    keytable: {
                        css: "https://cdn.datatables.net/keytable/2.12.0/css",
                        js: "https://cdn.datatables.net/keytable/2.12.0/js",
                        resolve: true
                    },
                    responsive: {
                        css: "https://cdn.datatables.net/responsive/3.0.0/css",
                        js: "https://cdn.datatables.net/responsive/3.0.0/js",
                        resolve: true
                    },
                    rowgroup: {
                        css: "https://cdn.datatables.net/rowgroup/1.5.0/css",
                        js: "https://cdn.datatables.net/rowgroup/1.5.0/js",
                        resolve: true
                    },
                    rowreorder: {
                        css: "https://cdn.datatables.net/rowreorder/1.5.0/css",
                        js: "https://cdn.datatables.net/rowreorder/1.5.0/js",
                        resolve: true
                    },
                    scroller: {
                        css: "https://cdn.datatables.net/scroller/2.4.1/css",
                        js: "https://cdn.datatables.net/scroller/2.4.1/js",
                        resolve: true
                    },
                    select: {
                        css: "https://cdn.datatables.net/select/2.0.0/css",
                        js: "https://cdn.datatables.net/select/2.0.0/js",
                        resolve: true
                    },
                    searchbuilder: {
                        css: "https://cdn.datatables.net/searchbuilder/1.7.0/css",
                        js: "https://cdn.datatables.net/searchbuilder/1.7.0/js",
                        resolve: true
                    },
                    searchpanes: {
                        css: "https://cdn.datatables.net/searchpanes/2.3.0/css",
                        js: "https://cdn.datatables.net/searchpanes/2.3.0/js",
                        resolve: true
                    },
                    staterestore: {
                        css: "https://cdn.datatables.net/staterestore/1.4.0/css",
                        js: "https://cdn.datatables.net/staterestore/1.4.0/js",
                        resolve: true
                    },
                    datetime: {
                        css: "https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css",
                        js: "https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"
                    },
                    bootstrap: {
                        css: "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css",
                        js: "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                    },
                    bootstrap4: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css",
                        js: "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"
                    },
                    bootstrap5: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css",
                        js: "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"
                    },
                    bulma: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css"
                    },
                    foundation: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css",
                        js: "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"
                    },
                    jqueryui: {
                        css: "https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css",
                        js: "https://code.jquery.com/ui/1.13.2/jquery-ui.js"
                    },
                    material: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css",
                        js: "https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js"
                    },
                    semanticui: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css",
                        js: "https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"
                    },
                    uikit: {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css",
                        js: "https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/js/uikit.min.js"
                    },
                    tailwindcss: {
                        js: "https://cdn.tailwindcss.com"
                    },
                    "font-awesome": {
                        css: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                    },
                    "world-flags-sprite": {
                        css: "https://cdn.jsdelivr.net/gh/lafeber/world-flags-sprite/stylesheets/flags32-both.css"
                    },
                    demo: {
                        css: "./resources/demo.css",
                        js: "./resources/demo.js"
                    },
                    syntax: {
                        css: "./resources/syntax/shCore.css",
                        js: "./resources/syntax/shCore.js"
                    },
                    "buttons-html5": {
                        js: "https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"
                    },
                    "buttons-colvis": {
                        js: "https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"
                    },
                    "buttons-print": {
                        js: "https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"
                    },
                    jquery: {
                        js: "https://code.jquery.com/jquery-3.7.1.js"
                    },
                    jszip: {
                        js: "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"
                    },
                    pdfmake: {
                        js: "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
                    },
                    vfsfonts: {
                        js: "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"
                    },
                    moment: {
                        js: "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"
                    },
                    luxon: {
                        js: "https://cdnjs.cloudflare.com/ajax/libs/luxon/2.3.1/luxon.min.js"
                    },
                    sparkline: {
                        js: "https://cdn.jsdelivr.net/gh/fnando/sparkline/dist/sparkline.js"
                    },
                    "editor-demo": {
                        js: "./resources/editor-demo.js"
                    }
                }
            },
            jquery: function () {
                var editor = new DataTable.Editor({
                    ajax: {
                        url: '{!! route('items.store') !!}',
                        type: 'POST',
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                        }
                    },
                    fields: [
                        {
                            label: 'Name:',
                            name: 'name'
                        },
                        {
                            label: 'Priority:',
                            name: 'readingOrder'
                        }
                    ],
                    table: '#example'
                });

                var table = $('#example').DataTable({
                    // ajax: './res.txt',
                    ajax: '{!! route('items.data') !!}',
                    columns: [
                        { data: 'readingOrder', className: 'reorder' },
                        { data: 'name' },
                        {
                            data: 'created_at',
                            render: function (data, type, row) {
                                return parseInt(data / 60, 10) + 'h ' + (data % 60) + 'm';
                            }
                        }
                    ],
                    columnDefs: [{ orderable: false, targets: [1, 2] }],
                    layout: {
                        topStart: {
                            buttons: [
                                { extend: 'create', editor: editor },
                                { extend: 'edit', editor: editor },
                                { extend: 'remove', editor: editor }
                            ]
                        }
                    },
                    rowReorder: {
                        dataSrc: 'readingOrder',
                        editor: editor
                    },
                    select: true
                });

                editor
                    .on('postCreate postRemove', function () {
                        // After create or edit, a number of other rows might have been effected -
                        // so we need to reload the table, keeping the paging in the current position
                        table.ajax.reload(null, false);
                    })
                    .on('initCreate', function () {
                        // Enable order for create
                        editor
                            .field('readingOrder')
                            .fieldInfo('Leave empty to insert as next in list.')
                            .enable();
                    })
                    .on('initEdit', function () {
                        // Disable for edit (re-ordering is performed by click and drag)
                        editor
                            .field('readingOrder')
                            .fieldInfo('This field can only be edited via click and drag row reordering.')
                            .disable();
                    });
            },
            vanilla: function () {
                const editor = new DataTable.Editor({
                    ajax: {
                        url: '{!! route('items.store') !!}',
                        type: 'POST',
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                        }
                    },
                    fields: [
                        {
                            label: 'Name:',
                            name: 'name'
                        },
                        {
                            label: 'Priority:',
                            name: 'readingOrder'
                        }
                    ],
                    table: '#example'
                });

                const table = new DataTable('#example', {
                    // ajax: './res.txt',
                    ajax: '{!! route('items.data') !!}',
                    columns: [
                        { data: 'readingOrder', className: 'reorder' },
                        { data: 'name' },
                        {
                            data: 'created_at',
                            render: (data) => parseInt(data / 60, 10) + 'h ' + (data % 60) + 'm'
                        }
                    ],
                    columnDefs: [{ orderable: false, targets: [1, 2] }],
                    layout: {
                        topStart: {
                            buttons: [
                                { extend: 'create', editor: editor },
                                { extend: 'edit', editor: editor },
                                { extend: 'remove', editor: editor }
                            ]
                        }
                    },
                    rowReorder: {
                        dataSrc: 'readingOrder',
                        editor: editor
                    },
                    select: true
                });

                editor
                    .on('postCreate postRemove', function () {
                        // After create or edit, a number of other rows might have been effected -
                        // so we need to reload the table, keeping the paging in the current position
                        table.ajax.reload(null, false);
                    })
                    .on('initCreate', function () {
                        // Enable order for create
                        editor
                            .field('readingOrder')
                            .fieldInfo('Leave empty to insert as next in list.')
                            .enable();
                    })
                    .on('initEdit', function () {
                        // Disable for edit (re-ordering is performed by click and drag)
                        editor
                            .field('readingOrder')
                            .fieldInfo('This field can only be edited via click and drag row reordering.')
                            .disable();
                    });
            }
        });
    </script>

</head>
<body class="dt-example php">
<div class="container">
    <section>
        <div class="demo-html">
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th width="15%">Reading Order</th>
                    <th width="75%">Name</th>
                    <th width="10%">Created At</th>
                </tr>
                </thead>
            </table>
        </div>
    </section>
</div>
</body>
</html>
