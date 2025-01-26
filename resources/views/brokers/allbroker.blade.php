<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>All Brokers</title>
    
    <!-- Boxicons and Bootstrap CDN Links -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .table-responsive { margin-top: 1rem; }
        .d-flex.justify-content-between { padding-bottom: 1rem; }
        .form-group label { margin-right: 5px; }
        .modal-title { font-weight: bold; color: #fff; }
        .modal-footer .btn-primary { background-color: #007bff; border-color: #007bff; }
        .modal-footer .btn-secondary { background-color: #6c757d; border-color: #6c757d; }
        .text_body { font-weight: 300; font-size: 15px; }
    </style>
</head>
<body>

@include('dashboard.sidebar')

<section class="home-section">
  @include('dashboard.header')

  <div class="home-content">
    <div class="overview-boxes">
      <div class="container bg-body pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4>List of Brokers</h4>
          <button class="btn btn-primary" data-bs-target="#addBrokerModal" data-bs-toggle="modal">+ Create New</button>
        </div>

        <!-- Add Broker Modal -->
        <div class="modal fade" id="addBrokerModal" aria-hidden="true" aria-labelledby="addBrokerModalLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title" id="addBrokerModalLabel">Add Broker Details</h5>
              </div>
              <div class="modal-body">
                <form id="addBrokerForm" >
                  <div class="form-group">
                    <label for="brokerName" class="mb-2">Name</label>
                    <input type="text" class="form-control" id="brokerName" name="brokerName" placeholder="Enter broker name" required>
                  </div>
                  <div class="form-group mt-4">
                    <label for="brokerPhone" class="mb-2">Phone</label>
                    <input type="tel" class="form-control" id="brokerPhone" name="brokerPhone" placeholder="Enter phone number" required>
                  </div>
                  <div class="form-group mt-4">
                    <label for="brokerGramPanchayat" class="mb-2">Gram Panchayat</label>
                    <select class="form-control" id="brokerGramPanchayat" name="brokerGramPanchayat" required>
                      <option selected disabled>Select Gram Panchayat</option>
                      <option>Option 1</option>
                      <option>Option 2</option>
                      <option>Option 3</option>
                    </select>
                  </div>
                  <div class="form-group mt-4">
                    <label for="brokerAddress" class="mb-2">Additional Address</label>
                    <textarea class="form-control" id="brokerAddress" name="brokerAddress" rows="3" placeholder="Enter additional address"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="saveBrokerBtn">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th class="bg-warning">#</th>
                <th class="bg-warning">Name</th>
                <th class="bg-warning">Phone</th>
                <th class="bg-warning">Date Created</th>
                <th class="bg-warning">Action</th>
              </tr>
            </thead>
            <tbody id="brokerTableBody">
              @foreach ($brokers as $item)
              <tr>
                <td>{{ $item->broker_id }}</td>
                <td>{{ $item->broker_name }}</td>
                <td>{{ $item->broker_phone }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <button class="btn btn-primary btn-sm view-broker-btn" data-broker-id="{{ $item->broker_id }}">VIEW</button>
                  <a href="{{ route('broker.edit', $item->broker_id) }}" class="btn btn-success btn-sm">Edit</a>
                  <button class="btn btn-warning btn-sm delete-broker-btn" data-broker-id="{{ $item->broker_id }}">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          $(document).ready(function () {
            // Handle Save Broker
            $('#saveBrokerBtn').on('click', function () {
              const brokerData = $('#addBrokerForm').serialize();
              $.ajax({
                url: '/broker', // Update with your backend route
                method: 'POST',
                data: brokerData,
                success: function (response) {
                  alert('Broker added successfully!');
                  location.reload(); // Refresh page
                },
                error: function (xhr, status, error) {
                  alert('Error adding broker: ' + error);
                }
              });
            });

            // Handle Delete Broker
            $('.delete-broker-btn').on('click', function () {
              const brokerId = $(this).data('broker-id');
              if (confirm('Are you sure you want to delete this broker?')) {
                $.ajax({
                  url: `/broker/${brokerId}`, // Update with your backend route
                  method: 'DELETE',
                  success: function (response) {
                    alert('Broker deleted successfully!');
                    location.reload();
                  },
                  error: function (xhr, status, error) {
                    alert('Error deleting broker: ' + error);
                  }
                });
              }
            });

            // Handle View Broker
            $('.view-broker-btn').on('click', function () {
              const brokerId = $(this).data('broker-id');
              $.ajax({
                url: `/broker/${brokerId}`, // Update with your backend route
                method: 'GET',
                success: function (data) {
                  alert(JSON.stringify(data)); // Replace with modal population logic
                },
                error: function (xhr, status, error) {
                  alert('Error fetching broker details: ' + error);
                }
              });
            });
          });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </div>
    </div>
  </div>
</section>

</body>
</html>
