@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Grade News</h6>
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
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="search...">
                    </div>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New Grade News  </button>
                </div>



            </div>
        </div>

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Grade News table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if(count($news) > 0)
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Level</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Term</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">News Title</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">News Details</th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">status</th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Creation Date</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $n)
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">
                                                        {{$n->grade->grade_name}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">{{$n->term->name}}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold d-inline-block text-truncate" style="max-width: 200px">{{$n->title}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold d-inline-block text-truncate" style="max-width: 200px">{{$n->description}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold {{$n->status == 1 ? 'text-info' : 'text-danger'}}">
                                                        {{$n->status == 1 ? 'Enabled' : 'Disabled'}}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">{{$n->created_at}}</span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <a  class="text-secondary font-weight-bold text-xs  me-3" onclick="javascript:getNews({{$n->id}})" role="button">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>

                                                    <a class="text-secondary font-weight-bold text-xs me-3" onclick="javascript:deleteNews({{$n->id}})" role="button" data-id="{{$n['id']}}">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs  "  data-bs-toggle="modal" href="#" role="button">
                                                        <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center my-5">
                                    {{$news->render()}}
                                </div>
                            @else
                                <p class="text-center text-danger">There are no news</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update Grade News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formData" method="POST" action="" class="my-1 py-1">
                            <div class="modal-body">
                                @csrf
                                @method('PATCH')
                                <p>News publishing</p>
                                <select class="form-select mb-2" aria-label="Default select example" name="term" id="term" required>
                                    <option value="0">All</option>
                                    @if($terms)
                                        @foreach($terms as $term)
                                        <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select class="form-select mb-2" aria-label="Default select example" name="grade" id="grade" required>
                                    <option value="0">All</option>
                                    @if($grades)
                                        @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <input id="title" name="title" class="form-control my-1 mb-2 " type="text" placeholder="News Title" aria-label="News Title" required>

                                <textarea id="details" name="details" class="form-control  my-1 mb-2" placeholder="News Details" rows="13" required></textarea>
                                <select name="status" class="form-select" aria-label="Default select example" id="status" required>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Grade News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/admin/grade-news" class="my-1 py-1">
                            <div class="modal-body">
                                @csrf
                                @method('POST')
                                <p>News publishing</p>
                                <select name="term" class="form-select mb-2" aria-label="Default select example" required>
                                    <option disabled selected>Select Term</option>
                                    @if($terms)
                                    @foreach($terms as $term)
                                        <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                        @endif
                                </select>
                                <select name="grade" class="form-select mb-2" aria-label="Default select example" required>
                                    <option disabled selected>Select Grade</option>
                                    @if($grades)
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                        @endforeach
                                        @endif
                                </select>
                                <input name="title" class="form-control my-1 mb-2 " type="text" placeholder="News Title" aria-label="News Title" required>
                                <textarea name="details" class="form-control  my-1 mb-2" id="exampleFormControlTextarea1" placeholder="News Details" rows="13" required></textarea>
                                <select name="status" class="form-select" aria-label="Default select example" required>
                                    <option hidden>Select news status</option>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary" >Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" action="" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <p class="text-center text-danger">Are you sure you want to delete this news?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                @section('scripts')
                    <script src="{{ asset('js/axios.min.js')}}"></script>

                    <script>
                        function getNews(id) {
                            axios({
                                method:'get',
                                url:'/admin/grade-news/' + id + '/edit'
                            })
                                .then(response =>{
                                    if(response.status === 200){
                                        $('#formData').attr('action','/admin/grade-news/'+id);
                                        $('#term').val(response.data.term_id);
                                        $('#grade').val(response.data.level_id);
                                        $('#title').val(response.data.title);
                                        $('#details').val(response.data.description);
                                        $('#status').val(response.data.status);
                                        $('#examplUpdate').modal('show');
                                    }
                                })

                        }

                        function deleteNews(id) {
                            $('#deleteForm').attr('action','/admin/grade-news/'+id);
                            $('#deleteModal').modal('show');
                        }
                    </script>

@endsection
@endsection
