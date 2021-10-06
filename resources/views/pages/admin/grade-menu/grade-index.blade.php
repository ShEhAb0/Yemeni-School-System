@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Grades</h6>

    </div>
@endsection
@section('content')


    <div class="container-fluid">
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
                <!-- New Grade -->
                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">New Grade
                    </button>
                </div>


            </div>
        </div>

        <!-------------------------Start Grades Table------------------------------->
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Grades table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="datatable">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Grade Code</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Grade Name</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Students Number</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Creation Date And Time</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th scope="row" class="text-sm font-weight-bold mb-0 text-center">

                                            </th>
                                            <td class="text-secondary text-sm font-weight-bold text-center">

                                            </td>
                                            <td class="text-sm font-weight-bold mb-0 text-center">

                                            </td>



                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">}</p>

                                            </td>


                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold"></span>
                                            </td>
                                            <td class="align-middle text-center">

                                                <a  href="" class="text-secondary font-weight-bold text-xs  me-3 " data-bs-toggle="modal" data-bs-target="#editModal" role="button" >
                                                    <i class="fas fa-edit purplel-color  " style="font-size: 20px;"></i>
                                                </a>

                                                <a href="#" class="text-secondary font-weight-bold text-xs me-3 " data-bs-toggle="modal" data-bs-target="#deleteModal"  role="button"     >
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
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
            <!-------------------------End Grades Table------------------------------->


            <!-------------------------Start New Grade------------------------------->


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Grade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" >
                                {{csrf_field()}}

                                <input class="form-control my-1 mb-2  " required type="text"  placeholder="Grade Code"
                                       name="grade_code" aria-label="Grade Code" >

                                <input class="form-control my-1 mb-2" required   type="text" placeholder="Grade Name" name="grade_name"
                                       aria-label="Grade Name">



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------End New Grade------------------------------->




            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1"  id="editForm" >
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <input class="form-control my-1 mb-2 " type="text" name="grade_code" id="grade_code" placeholder="Name of Subject" aria-label="Name of Subject" >
                                <input class="form-control my-1 mb-2 " type="text" name="grade_name" id="grade_name" placeholder="Subject Code" aria-label="Subject Code">


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-------------------------End Update Grade------------------------------->


    <!-------------------------Start Delete Grade------------------------------->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="my-1 py-1"  id="deleteForm">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" id="id" value="">

                        <p>Are you sure you want to delete this grade?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-primary" >Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-------------------------End Delete Grade------------------------------->


    @endsection


    @section('scripts')


            <script>
                var editModal = document.getElementById('#editModal')


                $('#editModal').on('show.bs.modal' , function (event){


                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var grade_name = button.data('grade_name')
                    var grade_code = button.data('grade_code')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #grade_name').val(grade_name);
                    modal.find('.modal-body #grade_code').val(grade_code);

                })

                $('#deleteModal').on('show.bs.modal' , function (event){


                    var button = $(event.relatedTarget)
                    var id = button.data('id')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);

                })

            </script>

@endsection
