<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Product</title>
</head>
<body>
    <!-- Add Button -->
    <button class="btn btn-primary" id="addButton">Add</button>

    <!-- Table -->
    <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product )
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ @$product->name }}</td>
            <td>
                <button id="editbutton" data-name="{{ $product->name }}" data-id="{{ $product->id }}" >Edit</button>
                <button>Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="testModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form action="{{ route('product.save') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Enter product name" class="form-control">
                <button type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div>
    <!-- Edit  Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form id="editForm" method="POST" >
                @csrf
                <input type="text" class="name"  name="name" placeholder="Enter product name" class="form-control">
                <button type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Script -->
    <script>
        $(document).ready(function() {
            $('#addButton').on('click', function() {
                $('#testModal').modal('show');
            });
            $(document).on('click', '#editbutton', function() {
                $('#editModal').modal('show');
                let name = $(this).data('name');
                let id = $(this).data('id');

                $('.name').val(name);
                let actionUrl = `{{ route('product.save', ':id') }}`.replace(':id', id);
                $('#editForm').attr('action', actionUrl);
            });

        });
    </script>
</body>
</html>
