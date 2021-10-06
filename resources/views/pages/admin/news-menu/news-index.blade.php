@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">News</h6>

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
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="search...">
                    </div>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  News  </button>
                </div>



            </div>
        </div>

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>News table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Group</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">News Title</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">News Details</th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Creation Date</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold d-inline-block text-truncate" style="max-width: 200px"></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold"></span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <a  class="text-secondary font-weight-bold text-xs  me-3"  role="button">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#deleteModal" role="button" >
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs  "  data-bs-toggle="modal" href="#" role="button">
                                                        <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--end-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formData" method="POST" action="" class="my-1 py-1">
                            <div class="modal-body">
                                @csrf
                                @method('PATCH')
                                <p>News publishing</p>
                                <select class="form-select" aria-label="Default select example" name="type" id="type" required>

                                </select>
                                <input id="title" name="title" class="form-control my-1 mb-2 " type="text" placeholder="News Title" aria-label="News Title" required>

                                <textarea id="details" name="details" class="form-control  my-1 mb-2" placeholder="News Details" rows="13" required></textarea>
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
                            <h5 class="modal-title" id="exampleModalLabel">New News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/user/news" class="my-1 py-1">
                            <div class="modal-body">
                                @csrf
                                @method('POST')
                                <p>News publishing</p>
                                <select name="type" class="form-select" aria-label="Default select example" required>
                                    <option hidden>Select your target group</option>
                                    <option value="0">All</option>
                                    <option value="1">Teachers</option>
                                    <option value="2">Students</option>
                                    <option value="3">Parents</option>
                                </select>
                                <input name="title" class="form-control my-1 mb-2 " type="text" placeholder="News Title" aria-label="News Title" required>
                                <textarea name="details" class="form-control  my-1 mb-2" id="exampleFormControlTextarea1" placeholder="News Details" rows="13" required></textarea>
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
                            <form class="my-1 py-1"  id="deleteForm">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p>Are you sure you want to delete this news?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                @section('scripts')
                    {{--                <script src="{{ asset('js/axios.min.js')}}"></script>--}}
                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    <script>
                        // $(document).ready(function () {
                        //
                        //     $.ajaxSetup({
                        //         headers: {
                        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //         }
                        //     });
                        // });

                        function getNews(id) {
                            axios({
                                method:'get',
                                url:'/user/news/' + id + '/edit'
                            })
                                .then(response =>{
                                    if(response.status === 200){
                                        $('#formData').attr('action','/user/news/'+id);
                                        $('#type').html(response.data.list);
                                        $('#title').val(response.data.news.title);
                                        $('#details').val(response.data.news.details);
                                        $('#examplUpdate').modal('show');

                                    }
                                })
                        }
                    </script>
                    <script>


                        $('#deleteModal').on('show.bs.modal' , function (event){


                            var button = $(event.relatedTarget)
                            var id = button.data('id')

                            var modal = $(this)
                            modal.find('.modal-body #id').val(id);

                        })

                    </script>


@endsection
@endsection
