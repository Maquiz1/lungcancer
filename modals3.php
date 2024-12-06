<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Inside Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    // Example data array
    $data = [
        ['id' => 1, 'name' => 'Item 1'],
        ['id' => 2, 'name' => 'Item 2'],
        ['id' => 3, 'name' => 'Item 3']
    ];
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item) : ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td>
                        <!-- Button to Open the First Modal -->
                        <button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#firstModal<?= $item['id'] ?>">
                            Open Modal 1
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php foreach ($data as $item) : ?>
        <!-- Modal 1 for <?= $item['name'] ?> -->
        <div class="modal fade" id="firstModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="firstModalLabel<?= $item['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="firstModalLabel<?= $item['id'] ?>">Modal 1 - <?= $item['name'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Item 1 Description</td>
                                    <td>
                                        <!-- Button to Open the Second Modal -->
                                        <button type="button" class="btn btn-secondary open-modal" data-toggle="modal" data-target="#secondModal<?= $item['id'] ?>">
                                            Open Modal 2
                                        </button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 for <?= $item['name'] ?> -->
        <div class="modal fade" id="secondModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="secondModalLabel<?= $item['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="secondModalLabel<?= $item['id'] ?>">Modal 2 - <?= $item['name'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal 2 Content -->
                        <p>This is Modal 2 for <?= $item['name'] ?>.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        $(document).ready(function() {
            // Ensure only one modal is open at a time
            $('.modal').on('show.bs.modal', function() {
                var opened = $('.modal.show').not($(this));
                opened.modal('hide');
            });

            // Optional: Close all modals when clicking outside the modal
            $(document).on('click', function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(event.target).modal('hide');
                }
            });

            // Optional: Prevent closing parent modal when closing child modal
            $('.modal').on('hide.bs.modal', function(event) {
                event.stopPropagation();
            });

            // Optional: Add additional modal interaction logic here
        });
    </script>

</body>

</html>