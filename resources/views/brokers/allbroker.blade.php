<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> All Boker </title>
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .table-responsive {
  margin-top: 1rem;
}

.d-flex.justify-content-between {
  padding-bottom: 1rem;
}

.form-group label {
  margin-right: 5px;
}
.modal-title {
  font-weight: bold;
  color: #fff;
}

.modal-footer .btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.modal-footer .btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
}
.text_body{
  font-weight: 300;
  font-size: 15px;
}
     </style>
   </head>
<body>


@include('dashboard.sidebar');

  <section class="home-section">
  
@include('dashboard.header');

    <div class="home-content">
      <div class="overview-boxes">
        <div class="container bg-body pt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>List of Brokers</h4>
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">+ Create New</button>
            </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="addBrokerModalLabel">Add Broker Details</h5>
          
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group ">
              <label for="brokerName" class="mb-2">Name</label>
              <input type="text" class="form-control" id="brokerName" placeholder="Enter broker name" required>
            </div>
            <div class="form-group mt-4">
              <label for="brokerPhone" class="mb-2">Phone</label>
              <input type="tel" class="form-control" id="brokerPhone" placeholder="Enter phone number" required>
            </div>
            <div class="form-group mt-4">
              <label for="brokerGramPanchayat" class="mb-2">Gram Panchayat</label>
              <select class="form-control" id="brokerGramPanchayat" required>
                <option selected disabled>Select Gram Panchayat</option>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
              </select>
            </div>
            <div class="form-group mt-4">
              <label for="brokerAddress" class="mb-2">Additional Address</label>
              <textarea class="form-control" id="brokerAddress" rows="3" placeholder="Enter additional address"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning">Save</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
            <div class="row justify-content-between">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="entriesSelect">Show</label>
                  <select id="entriesSelect" class="form-control d-inline-block w-auto">
                    <option>10 <i class='bx bxs-chevron-down'></i></option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                  </select>
                  entries
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group text-right">
                  <label for="searchInput">Search:</label>
                  <input type="text" id="searchInput" class="form-control d-inline-block w-auto">
                </div>
              </div>
            </div>
            
            <div class="table-responsive ">
              <table class="table table-bordered table-hover">
                <thead class="thead-light ">
                  <tr >
                    <th class="bg-warning">#</th>
                    <th class="bg-warning">Name</th>  
                    <th class="bg-warning">Phone</th>
                    <th class="bg-warning">Date Created</th>
                    <th class="bg-warning">Action</th>
                  </tr>
                </thead>
                  
                @foreach ($brokers as $item)
                    
                <tr>
                  <td>{{$item->broker_id}}</td>
                  <td>{{$item->broker_name}}</td>
                  <td>{{$item->broker_phone}}</td>
                  <td>{{$item->created_at}}</td>

                  <td><a href="{{ route('broker.show',$item->broker_id)}}" class="btn btn-primary btn-sm">VIEW</a></td>
                  <td><a href="{{ route('broker.edit',$item->broker_id )}}" class="btn btn-success btn-sm">edit</a></td>
                  {{-- <td>
                      <form action="{{route('broker.destroy',$item->broker_id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-warning btn-sm">delete</button> --}}
                      </form>
                  </td>
                </tr>
                @endforeach
              </table>
            <!--Modal View-->
            <div class="modal fade modal_view" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addBrokerModalLabel">Broker Details</h5>
                    
                  </div>
                  <div class="modal-body">
                      <hr>
                      <div class="mb-3 d-flex align-items-center justify-content-between">
                          <strong>Broker Name</strong>
                          <span>Aubal ns sarvis</span>
                      </div>
                      <hr>
                      <div class="mb-3 d-flex align-items-center justify-content-between">
                          <strong>Broker Phone</strong>
                          <span>9231904316</span>
                      </div>
                      <hr>
        
                      <div class="mb-3 d-flex align-items-center justify-content-between">
                          <strong>Gram Panchayat</strong>
                          <span>Jayar-Dwarbasini</span>
                      </div>
                      <hr>
                      <div class="mb-3 d-flex align-items-center justify-content-between">
                          <strong>Additional Address</strong>
                          <span>Jayar</span>
                      </div>
                      <hr>
                 
                  </div>
                  <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--Modal Edit-->
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addBrokerModalLabel">Add Broker Details</h5>
                    
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group ">
                        <label for="brokerName" class="mb-2">Name</label>
                        <input type="text" class="form-control" id="brokerName" placeholder="Enter broker name" required>
                      </div>
                      <div class="form-group mt-4">
                        <label for="brokerPhone" class="mb-2">Phone</label>
                        <input type="tel" class="form-control" id="brokerPhone" placeholder="Enter phone number" required>
                      </div>
                      <div class="form-group mt-4">
                        <label for="brokerGramPanchayat" class="mb-2">Gram Panchayat</label>
                        <select class="form-control" id="brokerGramPanchayat" required>
                          <option selected disabled>Select Gram Panchayat</option>
                          <option>Option 1</option>
                          <option>Option 2</option>
                          <option>Option 3</option>
                        </select>
                      </div>
                      <div class="form-group mt-4">
                        <label for="brokerAddress" class="mb-2">Additional Address</label>
                        <textarea class="form-control" id="brokerAddress" rows="3" placeholder="Enter additional address"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Model Delete -->
            <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                 
                    <h5 class="modal-title" id="addBrokerModalLabel">Confirmation</h5>
                    
                  </div>
                  <div class="modal-body">
                     <h5 class="text_body">Are you sure to delete this broker permanently?</h5>
                  </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">DELETE</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>

     
    </div>
  </section>

  <script>
 

   let sidebar = document.querySelector(".sidebars");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>