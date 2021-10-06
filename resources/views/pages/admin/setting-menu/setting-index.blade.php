@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">School Settings</h6>

    </div>
@endsection
@section('content')


    <div class="container-fluid py-4">

        <div class="row g-2 my-1 py-2">
            <form class="row g-2 my-1 py-2" enctype="multiform/form-data">
                @csrf


                    <div class="col-auto w_50">
                        <p>Name of School</p>
                        <input class="form-control my-1 mb-2" type="text" placeholder="Name of School" value=""   name="school_name" >
                    </div>
                    <div class="col-auto w_50">
                        <p>Phone of School</p>
                        <input class="form-control my-1 mb-2 " type="text" placeholder="Phone of School" value="" name="school_phone" >
                    </div>
                    <div class="col-auto w_50">
                        <p>School Email</p>
                        <input class="form-control my-1 mb-2 " type="Email" placeholder="School Email" value="" name="school_email" >
                    </div>
                    <div class="col-auto w_50">
                        <p>Academic Year</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="Academic Year" name="academic_year" value=""
                               type="date" >
                    </div>
                    <div class="col-auto w-100">
                        <p>School Address</p>
                        <input class="form-control my-1 mb-2 " type="text" placeholder="School Address" value="" name="school_address" >
                    </div>
                    <div class="col-auto w_50">
                        <p>First Term Begin</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term Begin" value="" name="first_term_begin">
                    </div>

                    <div class="col-auto w_50">
                        <p>First Term End</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term End" value="" name="first_term_end"  >
                    </div>

                    <div class="col-auto w_50">
                        <p>Second Term Begin</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term Begin" value="" name="second_term_begin" >
                    </div>

                    <div class="col-auto w_50">
                        <p>Second Term End</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term End" value=""  name="second_term_end">
                    </div>

                    <div >
                        <p>School Icon</p>
                        <img src="" class="avatar" style="width: 150px" height="150px" >
                    </div>




                <div class="col-auto w_50 text-center">
                    <button type="submit" class="btn btn-primary mb-3 w_50">Save</button>
                </div>
                <div class="col-auto w_50 text-center">
                    <button type="button" class="btn btn-secondary mb-3 w_50" data-bs-toggle="modal" data-bs-target="#editModal"  >Edit</button>
                </div>
            </form>
        </div>
    </div>






    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="Settingss" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Settingss">Edit Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2 my-1 py-2"  id="editForm" enctype="multiform/form-data">
                        @csrf
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="id" value="">
                        <div class="col-auto w_50">
                            <p>Name of School</p>
                            <input class="form-control my-1 mb-2" type="text" placeholder="Name of School"  name="school_name" id="school_name" >
                        </div>
                        <div class="col-auto w_50">
                            <p>Phone of School</p>
                            <input class="form-control my-1 mb-2 " type="text" placeholder="Phone of School"  name="school_phone" id="school_phone" >
                        </div>
                        <div class="col-auto w_50">
                            <p>School Email</p>
                            <input class="form-control my-1 mb-2 " type="Email" placeholder="School Email"  name="school_email" id="school_email" >
                        </div>
                        <div class="col-auto w_50">
                            <p>Academic Year</p>
                            <input class="form-control my-1 mb-2 " type="date" placeholder="Academic Year" name="academic_year" id="academic_year"
                                   type="date" >
                        </div>
                        <div class="col-auto w-100">
                            <p>School Address</p>
                            <input class="form-control my-1 mb-2 " type="text" placeholder="School Address" name="school_address" id="school_address" >
                        </div>
                        <div class="col-auto w_50">
                            <p>First Term Begin</p>
                            <input class="form-control my-1 mb-2 " type="date" placeholder="This Term Begin"  name="first_term_begin" id="first_term_begin">
                        </div>

                        <div class="col-auto w_50">
                            <p>First Term End</p>
                            <input class="form-control my-1 mb-2 " type="date" placeholder="This Term End"  name="first_term_end" id="first_term_end"  >
                        </div>

                        <div class="col-auto w_50">
                            <p>Second Term Begin</p>
                            <input class="form-control my-1 mb-2 " type="date" placeholder="This Term Begin"  name="second_term_begin" id="second_term_begin" >
                        </div>

                        <div class="col-auto w_50">
                            <p>Second Term End</p>
                            <input class="form-control my-1 mb-2 " type="date" placeholder="This Term End"   name="second_term_end" id="second_term_end">
                        </div>

                        <div >
                            <p>Choose School Icon</p>
                            <input class="form-control  my-1 mb-2  " type="file" id="school_logo" name="school_logo" accept="image/*">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary" >Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!--end-->
        @endsection




        @section('scripts')
            <script>
                var editModal = document.getElementById('#editModal')


                $('#editModal').on('show.bs.modal' , function (event){


                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var school_name = button.data('school_name')
                    var school_phone = button.data('school_phone')
                    var school_email = button.data('school_email')
                    var school_address = button.data('school_address')
                    var academic_year = button.data('academic_year')
                    var first_term_begin = button.data('first_term_begin')
                    var first_term_end = button.data('first_term_end')
                    var second_term_begin = button.data('second_term_begin')
                    var second_term_end = button.data('second_term_end')
                    <!-- var school_logo = button.data('school_logo') -->


                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #school_name').val(school_name);
                    modal.find('.modal-body #school_phone').val(school_phone);
                    modal.find('.modal-body #school_email').val(school_email);
                    modal.find('.modal-body #school_address').val(school_address);
                    modal.find('.modal-body #academic_year').val(academic_year);
                    modal.find('.modal-body #first_term_begin').val(first_term_begin);
                    modal.find('.modal-body #first_term_end').val(first_term_end);
                    modal.find('.modal-body #second_term_begin').val(second_term_begin);
                    modal.find('.modal-body #second_term_end').val(second_term_end);
                    <!-- modal.onload('.modal-body #school_logo').val(school_logo);-->
                });


            </script>




@endsection
