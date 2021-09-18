@extends('backend.layouts.master')
@section('title')
    Slider | Trimatric
@endsection
@section('slider')
    active
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Slider</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sliders</li>

                        </ul>
                    {{-- add user modal start --}}
                    <!-- Button trigger modal -->
                        <a href="#" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">

                            Add Slider <i class="fas fa-plus"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="border-radius:20px;">
                                    <form class="mt-4" action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="card card-table">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h4 class="card-title text-white">Add Slider</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-11 m-auto">
                                                    <div class="form-group">
                                                        <label for="">Title (1)<span class="text-danger">*</span></label>
                                                        <input class="form-control " type="text" name="title_1" rows="4">{{ old('title_1') }}</input>
                                                        @error ('title_1')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Title (2)<span class="text-danger">*</span></label>
                                                        <input class="form-control " type="text" name="title_2" rows="4">{{ old('title_2') }}</input>
                                                        @error ('title_2')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Title (3)<span class="text-danger">*</span></label>
                                                        <input class="form-control " type="text" name="title_3" rows="4">{{ old('title_3') }}</input>
                                                        @error ('title_3')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description<span class="text-danger">*</span></label>
                                                        <textarea class="form-control " type="text" name="description" rows="4">{{ old('description') }}</textarea>
                                                        @error ('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Slider Status<span class="text-danger">*</span></label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="" selected disabled> Select Slider Status</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Deactivate">Deactivate</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Slider Image(Recommended: 1920px*1080px)<span class="text-danger">*</span></label>
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
                                        <button class="btn-primary btn-sm" type="submit">Add Slider</button>
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
                            Slider Added Not Successful, please fill Up Form correctly.
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card card-table">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="card-title text-white">List of Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($sliders as $slider)
                                        <tr>
                                            <input class="sliderDelete_val_id" type="hidden" name="id" value="{{ $slider->id }}">
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#"><img class="avatar avatar-lg ml-2 avatar-img rounded-circle" src=" {{ asset('/storage/uploads/slider') }}/{{ $slider->photo }}" alt="slider Image"></a>
                                                </h2>
                                            </td>
                                            <td>{{ $slider->title_1 }} {{ $slider->title_2 }} {{ $slider->title_3 }}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($slider->description, 20)  !!}</td>
                                            <td>{{$slider->status}}</td>
                                            <td>{{ $slider->created_at->diffForHumans() }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-basic{{$slider->id}}">
                                                    <span data-feather="eye"></span>
                                                </button>

                                                <a href="{{route('slider.edit',[$slider->id])}}" type="button" class="btn btn-secondary">
                                                    <span data-feather="edit"></span>
                                                </a>

                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$slider->id}}">
                                                    <span data-feather="trash-2"></span>
                                                </button>
                                            </td>
                                            <!-- /.modal View -->
                                            <div class="modal-basic modal fade show" id="modal-basic{{$slider->id}}" tabindex="-1"  aria-hidden="false">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content modal-bg-white ">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Slider Details</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span data-feather="x"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Title: <p>{{ $slider->title_1 }} {{ $slider->title_2 }} {{ $slider->title_3 }}</p>
                                                            Description: <p class="text-muted" style="word-wrap: break-word; word-break: break-all; text-overflow: ellipsis; white-space: normal">{{$slider->description}}</p>
                                                            Image: <br>
                                                            <img class="img-thumbnail" src="{{asset('storage/uploads/slider')}}/{{$slider->photo}}" alt="{{ $slider->title_1 }} {{ $slider->title_2 }} {{ $slider->title_3 }}" style="height: 200px; width: 300px">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal view End -->

                                            <!-- Modal Delete-->
                                            <div class="modal fade" id="exampleModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('slider.destroy',[$slider->id])}}" method="POST">
                                                            @csrf
                                                            {{method_field('DELETE')}}
                                                            <input type="hidden" name="id" value="{{$slider->id}}">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Do you Want to delete this Slider?</h6>
                                                                <p>Slider won't be available!!</p>
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





