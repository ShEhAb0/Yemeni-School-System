@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Terms</h6>

    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible text-white fade show mx-4 mt-4" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
        @endif
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible text-white fade show mx-4 mt-4" role="alert">
                {{$error}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
        @endforeach
        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-8">
                    <form action="{{ route('admin.terms') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Term</button>
                </div>

            </div>
        </div>


        <!-------------------------Start Terms Table------------------------------->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Terms table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($terms->count() > 0)
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Term Name</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($terms as $term)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$term->id}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$term->name}}</p>
                                        </td>
                                            <td class="align-middle text-center">
                                                <a  class="text-secondary font-weight-bold text-xs  me-3" role="button" onclick="javascript:getTerm({{$term->id}});">
                                                    <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                </a>

                                                <a class="text-secondary font-weight-bold text-xs me-3" role="button" onclick="javascript:deleteTerm({{$term->id}});">
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                <div class="text-center my-5">
                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no terms yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End Terms Table------------------------------->

            <!-------------------------Start New Term    ------------------------------->


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Term</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/terms">
                                @csrf
                                @method('POST')

                                <div class="my-1 mb-2">
                                    <input class="form-control" type="text" name="term_name" placeholder="Enter Term Name" aria-label="Enter Term Name" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------End New Term------------------------------->







            <!-------------------------Start Edit Term------------------------------->
            <div class="modal  fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Term</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')

                                <div class="my-1 mb-2">
                                    <input class="form-control" type="text" name="term_name" id="term_name" placeholder="Enter Term Name" aria-label="Enter Term Name" required>
                                </div>
                                    <br/>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-------------------------End Edit Term------------------------------->
        </div>
    </div>



    <!-------------------------Start Delete Term------------------------------->


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Term</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
{{--                        <input type="hidden" name="term_id" id="term_id" value="">--}}
                        <p class="text-danger">Are you sure you want to delete this term?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" >Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-------------------------End Delete Term------------------------------->

@section('scripts')
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        function getTerm(id) {
            axios({
                method:'get',
                url:'/admin/terms/' + id + '/edit'
            })
                .then(response =>{
                    if(response.status === 200){
                        $('#editForm').attr('action','/admin/terms/'+id);
                        $('#term_name').val(response.data.name);
                        $('#editModal').modal('show');
                    }
                })
        }

        function deleteTerm(id) {
            $('#deleteForm').attr('action','/admin/terms/'+id);
            $('#deleteModal').modal('show');
        }
    </script>
@endsection
@endsection
