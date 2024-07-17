<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cascade Modal Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h2>Table with Cascading Modals</h2>

    <?php
    $data = [
        ['id' => 1, 'name' => 'Item 1'],
        ['id' => 2, 'name' => 'Item 2'],
        ['id' => 3, 'name' => 'Item 3']
    ];
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($data as $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td>
                    <!-- Button to Open the First Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1-<?= $item['id'] ?>">
                        Open Modal 1
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php foreach ($data as $item) : ?>
        <!-- The First Modal -->
        <div class="modal fade" id="myModal1-<?= $item['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal 1 - <?= $item['name'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>This is Modal 1 for <?= $item['name'] ?>.</p>
                        <!-- Button to Open the Second Modal -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal2-<?= $item['id'] ?>">
                            Open Modal 2
                        </button>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- The Second Modal -->
        <div class="modal fade" id="myModal2-<?= $item['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal 2 - <?= $item['name'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>This is Modal 2 for <?= $item['name'] ?>.</p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        $(document).ready(function() {
            // Close the first modal when the second modal is shown
            $('[id^=myModal2-]').on('show.bs.modal', function() {
                var id = $(this).attr('id').replace('myModal2-', '');
                $('#myModal1-' + id).modal('hide');
            });

            // Handle the closing of modals to reset state
            $('[id^=myModal1-], [id^=myModal2-]').on('hidden.bs.modal', function() {
                // You can add custom behavior when modals are closed, if needed
            });
        });
    </script>

</body>

</html>