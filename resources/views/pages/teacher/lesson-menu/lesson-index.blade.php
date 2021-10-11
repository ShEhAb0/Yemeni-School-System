@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Lessons</h6>
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
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New Lesson</button>
                </div>
                <br/>
                <br/>
                <div class="row g2">

                    <div class="col-auto w_50">
                        <p>Select Grade</p>
                        <select class="form-select" aria-label="Select Grade" id="Grade" name="Grade">


                        </select>
                    </div>
                    <div class="col-auto w_50">
                        <p>Select Subject</p>
                        <select class="form-select" aria-label="Select Class" id="Subject" name="Subject">



                        </select>
                    </div>


                </div>


            </div>
        </div>
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Lessons table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($lessons->count() > 0)

                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Lesson title</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Publishing Date</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                            </td>



                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold"></span>
                                            </td>
                                            <td class="align-middle text-center">

                                                <a  class="text-secondary font-weight-bold text-xs  me-3"   data-bs-toggle="modal" data-bs-target="#editModal"  role="button">      <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                </a>

                                                <a  class="text-secondary font-weight-bold text-xs me-3" data-bs-toggle="modal" data-bs-target="#deleteModal" role="button">  <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                                <a  class="text-secondary font-weight-bold text-xs me-3"  data-bs-toggle="modal" href="#attendance" role="button">
                                                    <i class="far fa-id-card purplel-color" style="font-size: 20px;"></i>
                                                </a>

                                                <a  class="text-secondary font-weight-bold text-xs  "  data-bs-toggle="modal" href="./lesson/show" role="button">
                                                    <i class="fas fa-external-link-alt blue-color" style="font-size: 20px;"></i>
                                                </a>

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no lessons yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->




            <!-------------------------Start Edit Lesson------------------------------->


            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModal">Update Lesson</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2 my-1 py-1" action="" method="POST" id="editForm">

                                @csrf
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="col-auto w-100">
                                    <p>Lesson Title</p>
                                    <input class="form-control my-1 mb-2 " type="text" placeholder="add Lesson Title" aria-label="add Lesson Title" name="lesson_title" id="lesson_title" required>
                                </div>


                                <div class="col-auto w_50">
                                    <p>Select Grade</p>
                                    <select class="form-select" aria-label="Select Grade" id="grade_id" name="grade_id">


                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Subject</p>
                                    <select class="form-select" aria-label="Select Class" id="subject_id" name="subject_id">




                                    </select>
                                </div>
                                <div class="col-auto w-100">
                                    <P>Lesson Details</P>
                                    <textarea class="form-control" id="lesson_details" rows="3" required name="lesson_details" ></textarea>

                                </div>

                                <h6>Add Attachments</h6>
                                <div class="row g-2">
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>upload Video</p>
                                        <input class="form-control " type="file" id="upload_video" name="upload_video" accept="video/mp4,video/x-m4v,video/*" >
                                    </div>
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>upload Picture</p>
                                        <input class="form-control " type="file" id="upload_image" name="upload_image"  accept="image/png, image/gif, image/jpeg" >
                                    </div>
                                </div>
                                <div class="col-auto w-100  my-1 mb-2" >
                                    <p>upload file</p>
                                    <input class="form-control " type="file" id="upload_file" name="upload_file"  accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End Edit Lesson------------------------------->






            <!-------------------------Start New Lesson------------------------------->


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Lesson</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="row g-2 my-1 py-1" action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="col-auto w-100">
                                    <p>Lesson Title</p>
                                    <input class="form-control my-1 mb-2 " type="text" placeholder="add Lesson Title" aria-label="add Lesson Title" name="lesson_title" required>
                                </div>


                                <div class="col-auto w_50">
                                    <p>Select Grade</p>
                                    <select class="form-select" aria-label="Select Grade" id="grade" name="grade_id">


                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Subject</p>
                                    <select class="form-select" aria-label="Select Class" id="subject" name="subject_id">




                                    </select>
                                </div>
                                <div class="col-auto w-100">
                                    <P>Lesson Details</P>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="lesson_details"></textarea>

                                </div>

                                <h6>Add Attachments</h6>
                                <div class="row g-2">
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>upload Video</p>
                                        <input class="form-control " type="file" id="upload_video" name="upload_video" accept="video/mp4,video/x-m4v,video/*" >
                                    </div>
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>upload Picture</p>
                                        <input class="form-control " type="file" id="upload_image" name="upload_image"  accept="image/png, image/gif, image/jpeg" >
                                    </div>
                                </div>
                                <div class="col-auto w-100  my-1 mb-2" >
                                    <p>upload file</p>
                                    <input class="form-control " type="file" id="upload_file" name="upload_file"  accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-------------------------End New Lesson------------------------------->






            <!-------------------------Start Delete Lesson------------------------------->


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Lesson</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" action="" method="POST" id="deleteForm">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p>Are you sure you want to delete this lesson?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------End Delete Lesson------------------------------->





            <div class="modal fade" id="attendance" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal">Student attendance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body max-height-vh-80" style="overflow-y:auto">
                            <div class="list-group mb-1">
                                <a href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                            <br/>
                                            <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





@endsection

@section('scripts')
    <!--
 <script>
        var editModal = document.getElementById('#editModal')


        $('#editModal').on('show.bs.modal' , function (event){


            var button = $(event.relatedTarget)
            var id = button.data('id')
            var lesson_title = button.data('lesson_title')
            var lesson_details = button.data('lesson_details')
            var upload_image = button.data('upload_image')
            var upload_video = button.data('upload_video')
            var upload_file = button.data('upload_file')
            var teacher_id = button.data('teacher_id')
            var grade_id = button.data('grade_id')
            var subject_id = button.data('subject_id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #lesson_title').val(lesson_title);
            modal.find('.modal-body #lesson_details').val(lesson_details);
            modal.find('.modal-body #upload_image').val(upload_image);
            modal.find('.modal-body #upload_video').val(upload_video);
            modal.find('.modal-body #upload_file').val(upload_file);
            modal.find('.modal-body #teacher_id').val(teacher_id);
            modal.find('.modal-body #grade_id').val(grade_id);
            modal.find('.modal-body #subject_id').val(subject_id);

        })

        $('#deleteModal').on('show.bs.modal' , function (event){


            var button = $(event.relatedTarget)
            var id = button.data('id')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);

        })

    </script>
 -->

@endsection
