@extends('backend.layouts.master')
@section('title')
    CV
@endsection
@section('cv')
    active
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Client</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">CV</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="card-title text-white">List of CVs</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>position</th>
                                            <th>description</th>
                                            <th>CV</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cvs as $key=>$row)
                                        <tr>
                                            <input class="Delete_val_id" type="hidden" name="id" value="{{ $row->id }}">
                                            <td>{{$key+1}}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->position }}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($row->description, 20)  !!}</td>
                                            <td>
                                                <button class="btn btn-white">
                                                    <a href="{{asset('storage/uploads/cv')}}/{{$row->position}}/{{(date('Y-m-d'))}}/{{$row->file}}">Download CV</a>
                                                </button>
                                            </td>

                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-white text-secondary mr-2" data-toggle="modal" data-target="#exampleModal{{$row->id}}">
                                                    <i class="far fa-eye mr-1"></i>View</a>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">CV</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @php
                                                                $cv = \App\Cv::where('id', $row->id)->first();
                                                            @endphp
                                                                Name: <p class="text-muted">{{$cv->name}}</p>
                                                                Email: <p class="text-muted">{{$cv->email}}</p>
                                                                Phone: <p class="text-muted">{{$cv->phone}}</p>
                                                                Position: <p class="text-muted">{{$cv->position}}</p>
                                                                About: <p class="text-muted">{{$cv->description}}</p>
                                                                CV:
                                                                <button class="btn btn-white">
                                                                    <a href="{{asset('storage/uploads/cv')}}/{{$row->position}}/{{(date('Y-m-d'))}}/{{$row->file}}">Download CV</a>
                                                                </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal END -->
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

@endsection
