@extends('backend.layouts.layout')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/pages/simple-datatables.css">
    <div id="main">
      @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
    @endif
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
    

 

<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Registerd Users Table</h3>

          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Agents Table</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
          <div class="card-header">
              Agents Table
          </div>
        

          <div class="card-body" style="overflow-x: auto;">
              <div class="table-responsive" style="max-height: 400px;">
                  <table class="table table-striped" id="table1">
                      <thead>
                          <tr>

                              <th scope="col">ID</th>
                              <th scope="col">User Name</th>
                              <th scope="col">User Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($alluseres as $users)
                              <tr>
                                  <td>{{ $users->id }}</td>
                                  <td>{{ $users->name }}</td>
                                  <td>{{ $users->email }}</td>
                                  <td>{{ $users->role }}</td>
                                 
                                  {{-- <td>
                                    <!-- Add the switch button -->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="statusSwitch{{ $users->id }}"
                                               {{ $users->status === 'active' ? 'checked' : '' }}
                                               onchange="changeStatus({{ $users->id }}, this.checked)">
                                    </div>
                                </td> --}}
                                <td>
                                    @if ($users->status == "active")
                                        <a href="{{ URL::to('user_update', $users->id) }}" class="btn btn-outline-primary"><i class="fa fa-toggle-on" aria-hidden="true"></i> Active</a>
                                    @else
                            
                                        <a href="{{ URL::to('user_update', $users->id) }}" class="btn btn-outline-danger send-email"><i class="fa fa-ban" aria-hidden="true"></i> Inactive</a>
                            
                                    @endif
                                </td>
                                  <td>
                                      <div style="display: flex; align-items: center;">
                                          <a href="{{ route('admin-deleteuser', ['id' => $users->id]) }}"
                                              onclick="confirmation(event)" style="margin-right: 10px;"><i
                                                  class="bi bi-trash" style="color: red;font-size:20px"></i></a>

                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>



      </div>

  </section>
</div>


</div>
<script src="{{ asset('admin') }}/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/simple-datatables.js"></script>
<script>
function confirmation(ev) {
  ev.preventDefault();
  var urlToRedirect = ev.currentTarget.getAttribute('href');
  console.log(urlToRedirect);
  swal({
          title: "Are you want to Delete this Data",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
              window.location.href = urlToRedirect;
          }
      });
}
</script>


<script>
    function changeStatus(userId, isChecked) {
        var status = isChecked ? 'active' : 'inactive';

        // You can use AJAX to update the status on the server
        $.ajax({
            type: 'POST',
            url: `/update-status/${userId}`,
            data: { status: status, _token: '{{ csrf_token() }}' }, // Add the CSRF token
            success: function (data) {
                // Handle the response
                console.log(data);

                swal({
                    title: `Status changed to ${status}`,
                    icon: "success",
                    timer: 2000,
                    buttons: false
                });
            },
            error: function (error) {
                // Handle the error
                console.error(error);
            }
        });
    }
</script>



@endsection

