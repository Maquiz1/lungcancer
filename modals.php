<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Cascade Modal</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

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

    <h2>Table with Custom Cascading Modals</h2>
    <table>
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Row 1, Cell 1</td>
            <td>Row 1, Cell 2</td>
            <td>
                <!-- Button to Open the First Modal -->
                <button id="myBtn1">Open Modal 1</button>
            </td>
        </tr>
    </table>

    <!-- The First Modal -->
    <div id="myModal1" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Modal 1</h2>
            <p>This is Modal 1.</p>
            <!-- Button to Open the Second Modal -->
            <button id="myBtn2">Open Modal 2</button>
        </div>

    </div>

    <!-- The Second Modal -->
    <div id="myModal2" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Modal 2</h2>
            <p>This is Modal 2.</p>
        </div>

    </div>

    <script>
        // Get the modals
        var modal1 = document.getElementById("myModal1");
        var modal2 = document.getElementById("myModal2");

        // Get the buttons that open the modals
        var btn1 = document.getElementById("myBtn1");
        var btn2 = document.getElementById("myBtn2");

        // Get the <span> elements that close the modals
        var span1 = modal1.getElementsByClassName("close")[0];
        var span2 = modal2.getElementsByClassName("close")[0];

        // When the user clicks the button, open the first modal
        btn1.onclick = function() {
            modal1.style.display = "block";
        }

        // When the user clicks the button, open the second modal
        btn2.onclick = function() {
            modal1.style.display = "none"; // Close the first modal
            modal2.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modals
        span1.onclick = function() {
            modal1.style.display = "none";
        }

        span2.onclick = function() {
            modal2.style.display = "none";
        }

        // When the user clicks anywhere outside of the modals, close them
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>

</body>

</html>