<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <title>Smart Training System</title>
    <style>
        body {
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
        table {
            margin-top: 20px;
        }
        .container {
            position: relative; /* Ensures the floating works correctly */
        }

        .btn-resize {
            padding: 10px 20px; /* Adjust size as needed */
            font-size: 16px; /* Adjust font size */
        }

        .float-end {
            float: right; /* Floats the button to the right */
            margin-top: 10px; /* Optional: adds space from the top */
        }


        .swal2-popup {
            width: 250px !important; /* Adjust width */
            height: 200px;
            max-width: 90% !important;
            font-size: 14px;
        }
        .rich-text {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
   
        
    </style>
</head>
<body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><h2>Smart Training System</h2></a>
    <div  class="collapse navbar-collapse">
   
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">@yield('title')</a>
            </li>
        </ul>
        </div>
        <a href="/" class="btn btn-danger float-end">←</a>
    </nav>   

    <div class="container">
        @yield('content')
    </div>

    
    {{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
    <script>
        function confirmDelete(Id) {
            Swal.fire({
                title: 'Are You Sure?',
                text: "You Want To Delete This !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + Id).submit();
                }
            });
        }
    </script>


</body>
</html>