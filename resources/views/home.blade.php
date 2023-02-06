@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 

                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <h3 class="panel-title">User Data</h3><br>
                        </div>
                        <div class="panel-body">
                         <div class="table-responsive">
                          <table id="data-table"class="stripe">  
                           <thead> <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Designation</th>
                            <th>Present Address</th>
                            <th>Parmanent Address</th>
                            
                           </tr></thead>
                           <tbody>
                           @foreach($users as $user)
                           <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->company}}</td>
                            <td>{{$user->designation}}</td>
                            <td>{{$user->present_address}}</td>
                            <td>{{$user->permanent_address}}</td>
                           </tr>
                           @endforeach
                           </tbody>
                          </table>
                         </div>
                        </div>
                       </div>
                </div>
            </div>
              
        </div>
    </div>
</div>

 <script type="text/javascript">
        $(document).ready(function() {
          $('#data-table').DataTable();
      } );
  </script>
@endsection
