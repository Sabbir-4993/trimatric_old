@extends('backend.layouts.master')
@section('title')
    Circular List
@endsection
@section('circular_list')
    active
@endsection

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Circular List</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Circular List</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Circular Added Not Successfully, please fill-up form correctly.
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Circular</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Vacancy</th>
                                        <th>Workplace</th>
                                        <th>Deadline</th>
                                        <th>Salary</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($circular as $key=>$row)
                                        <tr>
                                            <td>{{$row->title}}</td>
                                            <td>{{$row->vacancy}}</td>
                                            <td>{{$row->workplace}}</td>
                                            <td>{{$row->date}}</td>
                                            <td>{{$row->salary}}</td>
                                            <td>{{$row->type}}</td>
                                            <td>
                                                @if($row->status=='Active')
                                                    <p class="btn btn-primary">Active</p>
                                                @else
                                                    <p class="btn btn-danger">Deactivate</p>
                                                @endif
                                            </td>
                                            <td class="float-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-basic{{$row->id}}">
                                                    <span data-feather="eye"></span>
                                                </button>

                                                <a href="{{route('backend-circular.edit',[$row->id])}}" type="button" class="btn btn-secondary">
                                                    <span data-feather="edit"></span>
                                                </a>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$row->id}}">
                                                    <span data-feather="trash-2"></span>
                                                </button>
                                            </td>
                                            <!-- /.modal View -->
                                            <div class="modal-basic modal fade show" id="modal-basic{{$row->id}}" tabindex="-1"  aria-hidden="false">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content modal-bg-white ">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Circular Details</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span data-feather="x"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <u>Job Title:</u> <p>{{ $row->title }}</p>
                                                            <u>Job Type:</u> <p>{{ $row->type }}</p>
                                                            <u>Job Vacancy:</u> <p>{{ $row->vacancy }}</p>
                                                            <u>Job Location:</u> <p>{{ $row->workplace }}</p>
                                                            <u>Salary:</u> <p>{{ $row->salary }}</p>
                                                            <u>Job Details: </u>{!! html_entity_decode($row->details) !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal view End -->
                                            <!-- Modal Delete-->
                                            <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('backend-circular.destroy',[$row->id])}}" method="POST">
                                                            @csrf
                                                            {{method_field('DELETE')}}
{{--                                                            {{method_field('DELETE')}}--}}
                                                            <input type="hidden" name="id" value="{{$row->id}}">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Do you Want to delete this Circular?</h6>
                                                                <p>Circular won't be available!!</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    <!-- /Page Wrapper -->

@endsection

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection

@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
