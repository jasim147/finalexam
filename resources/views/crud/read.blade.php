@extends('layouts.app')

@section('content')

<style>
        .add-new-link {
            text-align: right;
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2>Employee Details</h2>
                        </div>
                        <div class="col-2 add-new-link">
                            <a href="{{ route('insert') }}" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th>Employee_id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $user)
                                <tr>
                                    <td>{{ $user->employee_id}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->number}}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->salary }}</td>
                                    
                                    <td>
                                        <a href="{{ route('edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('delete', $user->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footerScript')
    @if(Session::has('success'))
        <script type="text/javascript">
            $(function() {
                toastr.success("{{ Session::get('success') }}");
            })
        </script>
    @endif
    @if(Session::has('failed'))
        <script type="text/javascript">
            $(function() {
                toastr.error("{{ Session::get('failed') }}");
            })
        </script>
    @endif
@stop
