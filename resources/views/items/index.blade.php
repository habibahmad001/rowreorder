<!-- resources/views/items/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel DataTables Row Reordering</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.js"></script>
</head>
<body>
    <div class="container">
        <h1>Laravel DataTables Row Reordering</h1>
        <table class="table table-bordered" id="items-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#items-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('items') }}',
                columns: [
                    { data: 'order', name: 'order' },
                    { data: 'title', name: 'title' }
                ],
                rowReorder: {
                    dataSrc: 'order',
                    update: false
                }
            });

            table.on('row-reorder', function (e, diff, edit) {
                var items = [];
                var items1 = [];

                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var rowData = this.data();
                    items1.push({
                        id: rowData.id,
                        order: rowIdx + 1
                    });
                });

                console.log('Items to be updated:', items1);

                for (var i = 0, ien = diff.length; i < ien; i++) {
                    var rowData = table.row(diff[i].node).data();
                    items.push(rowData.id);
                }

                $.ajax({
                    url: '{{ url('items/update-order') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        items: items
                    },
                    success: function(response) {
                        table.ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
