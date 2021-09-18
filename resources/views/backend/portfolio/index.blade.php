@extends('backend.layouts.master')
@section('title')
    Portfolio
@endsection
@section('portfolio')
    active
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Project Image</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
                        </ul>
                    {{-- add user modal start --}}
                    <!-- Button trigger modal -->
                        <a href="#" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Add Project Image <i class="fas fa-plus"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="border-radius:20px;">
                                    <form class="mt-4" action="{{ route('backend-portfolio.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="card card-table">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h4 class="card-title text-white">Add Project Image</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-11 m-auto">
                                                    <div class="form-group">
                                                        @php
                                                            $projects = \App\Project::all()->sortByDesc("id");

                                                        @endphp
                                                        <label for="">Project Name<span class="text-danger">*</span></label>
                                                        <select name="project_id" id="" class="form-control" required>
                                                            <option value="" selected> Select Project Category</option>
                                                            @foreach($projects as $key=>$row)
                                                                <option value="{{$row->id}}"> {{$row->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Photo(Recommended: 1920*1080px)<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="file" name="profileImage[]" multiple="">
                                                        @error ('photo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn-sm btn-danger" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn-primary btn-sm" type="submit">Add Image</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- add user modal end --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Portfolio Added Not Successfully, please fill-up form correctly.
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card card-table">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="card-title text-white">List of Portfolio Images</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Project Name</th>
                                        <th>Category Name</th>
                                        <th>Created at</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($portfolios as $key=>$row)
                                        @php
                                            $projects = \App\Project::where('id',$row->project_id)->first();
                                        @endphp
                                        <tr>
                                            <input class="Delete_val_id" type="hidden" name="id" value="{{ $row->id }}">
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#"><img class="avatar avatar-lg ml-2 avatar-img" src=" {{asset('storage/uploads/portfolio')}}/{{$projects->cat_name}}/{{$projects->title}}/{{$row->photo}}" alt="slider Image"></a>
                                                </h2>
                                            </td>
                                            <td>{{ $projects->title }}</td>
                                            <td>{{ $projects->cat_name }}</td>
                                            <td>{{ $row->created_at->diffForHumans() }}</td>
                                            <td class="float-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-basic{{$row->id}}">
                                                    <span data-feather="eye"></span>
                                                </button>

                                                <a href="{{route('backend-portfolio.edit',[$row->id])}}" type="button" class="btn btn-secondary">
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
                                                            <h6 class="modal-title">Portfolio Image Details</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span data-feather="x"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Title: <p>{{ $projects->title }}</p>
                                                            Category: <p>{{$projects->cat_name}}</p>
                                                            Description: <p class="text-muted" style="word-wrap: break-word; word-break: break-all; text-overflow: ellipsis; white-space: normal">{{$projects->description}}</p>
                                                            Image: <br>
                                                            <img class="img-thumbnail" src="{{asset('storage/uploads/portfolio')}}/{{$projects->cat_name}}/{{$projects->title}}/{{$row->photo}}" alt="" style="height: 200px; width: 300px">
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
                                                        <form action="{{route('backend-portfolio.destroy',[$row->id])}}" method="POST">
                                                            @csrf
                                                            {{method_field('DELETE')}}
                                                            <input type="hidden" name="id" value="{{$row->id}}">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Do you Want to delete this portfolio?</h6>
                                                                <p>portfolio won't be available!!</p>
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

                                    @empty
                                        <tr>
                                            <td colspan="60">No Slider Found</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
