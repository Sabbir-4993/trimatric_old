@extends('backend.layouts.master')
@section('title')
    Project
@endsection
@section('project')
    active
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Project</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project</li>

                        </ul>
                    {{-- add user modal start --}}
                    <!-- Button trigger modal -->
                        <a href="#" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">

                            Add Project <i class="fas fa-plus"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="border-radius:20px;">
                                    <form class="mt-4" action="{{ route('backend-project.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card card-table">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h4 class="card-title text-white">Add Project</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-11 m-auto">
                                                        <div class="form-group">
                                                            <label for="">Project Category<span class="text-danger">*</span></label>
                                                            <select name="cat_name" id="" class="form-control">
                                                                <option value="" selected disabled> Select Project Category</option>
                                                                <option value="Corporate">Corporate</option>
                                                                <option value="Industrial">Industrial</option>
                                                                <option value="Architectural">Architectural</option>
                                                                <option value="GovernmentProject">Government Project</option>
                                                                <option value="Hospitality">Hospitality</option>
                                                                <option value="Residential">Residential</option>
                                                                <option value="Educational">Educational</option>
                                                                <option value="Religious">Religious</option>
                                                                <option value="FB">F & B</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Project Name<span class="text-danger">*</span></label>
                                                            <input class="form-control " type="text" name="title" rows="4">{{ old('title') }}</input>
                                                            @error ('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Project Start<span class="text-danger">*</span></label>
                                                            <input class="form-control " type="date" name="project_start" rows="4">{{ old('project_start') }}</input>
                                                            @error ('project_start')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Project Location<span class="text-danger">*</span></label>
                                                            <input class="form-control " type="text" name="project_address" rows="4">{{ old('project_address') }}</input>
                                                            @error ('project_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Project Status<span class="text-danger">*</span></label>
                                                            <select name="status" id="" class="form-control">
                                                                <option value="" disabled selected> Select Project Category</option>
                                                                <option value="Running">Running</option>
                                                                <option value="Complete">Complete</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Description<span class="text-danger">*</span></label>
                                                            <textarea class="form-control " type="text" name="description" rows="6">{{ old('description') }}</textarea>
                                                            @error ('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Photo(Recomeded: 1920px*715px)<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="file" name="photo">
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
                                            <button class="btn-primary btn-sm" type="submit">Add Project</button>
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
                            Project Added Not Successfully, please fill-up form correctly.
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card card-table">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="card-title text-white">List of Project</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Created at</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($projects as $key=>$row)

                                        <tr>
                                            <input class="Delete_val_id" type="hidden" name="id" value="{{ $row->id }}">
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#"><img class="avatar avatar-lg ml-2 avatar-img" src=" {{ asset('storage/uploads/projects') }}/{{$row->cat_name}}/{{ $row->photo }}" alt="{{$row->title}}"></a>
                                                </h2>
                                            </td>
                                            <td>{{ $row->title }}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($row->description, 20)  !!}</td>
                                            <td>{{$row->cat_name}}</td>
                                            <td>{{ $row->updated_at->diffForHumans() }}</td>

                                            <td class="float-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-basic{{$row->id}}">
                                                    <span data-feather="eye"></span>
                                                </button>
                                                <a href="{{route('backend-project.edit',[$row->id])}}" type="button" class="btn btn-secondary">
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
                                                            <h6 class="modal-title">Project Details</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span data-feather="x"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Title: <p>{{ $row->title }}</p>
                                                            Description: <p class="text-muted" style="word-wrap: break-word; word-break: break-all; text-overflow: ellipsis; white-space: normal">{{$row->description}}</p>
                                                            Image: <br>
                                                            <img class="img-thumbnail" src="{{ asset('storage/uploads/projects') }}/{{$row->cat_name}}/{{ $row->photo }}" alt="{{ $row->title}}" style="height: 200px; width: 300px">
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
                                                        <form action="{{route('backend-project.destroy',[$row->id])}}" method="POST">
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
                                                                <h6>Do you Want to delete this project?</h6>
                                                                <p>project won't be available!!</p>
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
