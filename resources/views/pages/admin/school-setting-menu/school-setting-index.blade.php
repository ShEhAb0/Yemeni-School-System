@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">School Settings</h6>

    </div>
@endsection
@section('content')

    <div class="container-fluid py-4">

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
        <div class="row g-2 my-1 py-2">

            <form class="row g-2 my-1 py-2" action="/admin/school/settings" method="POST" enctype="multiform/form-data">
                @csrf
                @method('POST')


                    <div class="col-auto w_50">

                        <p>Name of School</p>
                        <input class="form-control my-1 mb-2" type="text" placeholder="Name of School" value="{{$school_settings->school_name ?? ''}}"  name="school_name" >
                    </div>
                    <div class="col-auto w_50">
                        <p>Phone of School</p>
                        <input class="form-control my-1 mb-2 " type="text" placeholder="Phone of School" value="{{$school_settings->school_phone ?? ''}}" name="school_phone" >
                    </div>
                    <div class="col-auto w_50">
                        <p>School Email</p>
                        <input class="form-control my-1 mb-2 " type="Email" placeholder="School Email" value="{{$school_settings->school_email ?? ''}}" name="school_email" >
                    </div>
                    <div class="col-auto w_50">
                        <p>Academic Year</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="Academic Year" name="academic_year" value="{{ $school_settings->academic_year ?? '' }}"
                               type="date" >
                    </div>
                    <div class="col-auto w-100">
                        <p>School Address</p>
                        <input class="form-control my-1 mb-2 " type="text" placeholder="School Address" value="{{$school_settings->school_address ?? ''}}" name="school_address" >
                    </div>
                    <div class="col-auto w_50">
                        <p>First Term Begin</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term Begin" value="{{$school_settings->first_term_begin ?? ''}}" name="first_term_begin">
                    </div>

                    <div class="col-auto w_50">
                        <p>First Term End</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term End" value="{{$school_settings->first_term_end ?? ''}}" name="first_term_end"  >
                    </div>

                    <div class="col-auto w_50">
                        <p>Second Term Begin</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term Begin" value="{{$school_settings->second_term_begin ?? ''}}" name="second_term_begin" >
                    </div>

                    <div class="col-auto w_50">
                        <p>Second Term End</p>
                        <input class="form-control my-1 mb-2 " type="date" placeholder="This Term End" value="{{$school_settings->second_term_end ?? ''}}"  name="second_term_end">
                    </div>

{{--                    <div class="-align-center">--}}
{{--                        <p>School Icon</p>--}}
{{--                    </div>--}}

{{--                <div class="avatar" id="avatar">--}}
{{--                    <br>--}}
{{--                    <div id="preview"><img  src="{{asset('/images/school_logo/'.($school_settings->school_logo ?? ''))}}"  class="avatar_img" id="image">--}}
{{--                    </div>--}}
{{--                    <div class="avatar_upload" >--}}
{{--                        <label class="upload_label">Upload--}}
{{--                            <input type="file" id="school_logo" name="school_logo" accept="image/png, image/gif, image/jpeg">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row w_50 col-auto my-1 mb-2 w_50" style="margin-left: 12px;">
                    <p>Upload School Icon</p>
                    <input class="form-control" type="file"  id="schoollogo" name="schoollogo" accept="image/png, image/gif, image/jpeg">
                </div>
                @if(!$school_settings)
                <div class="row w-100 ">
                    <button type="submit" class="btn btn-primary mb-3 w_50">Save</button>
                </div>
                @else
                <div class="col-auto w_50 text-center">
                    <button type="button" class="btn btn-secondary mb-3 w_50" role="button" onclick="getSettings({{$school_settings->id}});">Edit</button>
                </div>
                    @endif
            </form>
{{--            @else--}}
{{--                <div class="text-center">--}}
{{--                    <p class="h5 text-danger">There are no teachers yet..!</p>--}}
{{--                </div>--}}
{{--            @endif--}}
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
                    <form class="row g-2 my-1 py-2"  action="" method="POST" id="editForm" enctype="multiform/form-data">
                        @csrf
                        @method('PUT')
{{--                        <input type="hidden" name="id" value="{{$school_setting['id']}}">--}}
                        <div class="col-auto w_50">
                            <p>Name of School</p>
                            <input class="form-control my-1 mb-2" type="text" placeholder="Name of School" name="school_name" id="school_name" >
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
            <script src="{{asset('js/axios.min.js')}}"></script>
            <script>
                function getSettings(id) {
                    axios({
                        method:'get',
                        url:'/admin/school/settings/' + id + '/edit'
                    })
                        .then(response =>{
                            if(response.status === 200){
                                $('#editForm').attr('action','/admin/school/settings/'+id);
                                $('#school_name').val(response.data.school_name);
                                $('#school_phone').val(response.data.school_phone);
                                $('#school_email').val(response.data.school_email);
                                $('#academic_year').val(response.data.academic_year);
                                $('#school_address').val(response.data.school_address);
                                $('#first_term_begin').val(response.data.first_term_begin);
                                $('#first_term_end').val(response.data.first_term_end);
                                $('#second_term_begin').val(response.data.first_term_begin);
                                $('#second_term_end').val(response.data.second_term_end);
                                // $('#school_logo').val(response.data.school_logo);
                                $('#editModal').modal('show');
                            }
                        })
                }


            </script>
{{--            <script>--}}


{{--                function showStudent(d){--}}
{{--                    $('#tname').html("Name: "+d.data('name'));--}}
{{--                    $('#tusername').html("Username: "+d.data('username'));--}}
{{--                    $('#temail').html("Email: "+d.data('email'));--}}
{{--                    $('#taddress').html("Address: "+d.data('address'));--}}
{{--                    $('#tphone').html("Phone Number: (+967) "+d.data('phone'));--}}
{{--                    $('#tgender').html("Gender: "+d.data('gender'));--}}

{{--                    $('#showModal').modal('show');--}}
{{--                };--}}

{{--            </script>--}}







{{--            <script>--}}
{{--                var editModal = document.getElementById('#editModal')--}}


{{--                $('#editModal').on('show.bs.modal' , function (event){--}}


{{--                    var button = $(event.relatedTarget)--}}
{{--                    var id = button.data('id')--}}
{{--                    var schooln = button.data('schooln')--}}
{{--                    var schoolp = button.data('schoolp')--}}
{{--                    var schoole = button.data('schoole')--}}
{{--                    var school_address = button.data('school_address')--}}
{{--                    var academic_year = button.data('academic_year')--}}
{{--                    var first_term_begin = button.data('first_term_begin')--}}
{{--                    var first_term_end = button.data('first_term_end')--}}
{{--                    var second_term_begin = button.data('second_term_begin')--}}
{{--                    var second_term_end = button.data('second_term_end')--}}
{{--                    // <!-- var school_logo = button.data('school_logo') -->--}}


{{--                    var modal = $(this)--}}
{{--                    modal.find('.modal-body #id').val(id);--}}
{{--                    modal.find('.modal-body #schooln').val(schooln);--}}
{{--                    modal.find('.modal-body #schoolp').val(schoolp);--}}
{{--                    modal.find('.modal-body #schoole').val(schoole);--}}
{{--                    modal.find('.modal-body #school_address').val(school_address);--}}
{{--                    modal.find('.modal-body #academic_year').val(academic_year);--}}
{{--                    modal.find('.modal-body #first_term_begin').val(first_term_begin);--}}
{{--                    modal.find('.modal-body #first_term_end').val(first_term_end);--}}
{{--                    modal.find('.modal-body #second_term_begin').val(second_term_begin);--}}
{{--                    modal.find('.modal-body #second_term_end').val(second_term_end);--}}
{{--                    <!-- modal.onload('.modal-body #school_logo').val(school_logo);-->--}}
{{--                });--}}


{{--            </script>--}}

{{--           <script>--}}


{{--                   var upload = document.getElementById("school_logo");--}}
{{--                   var preview = document.getElementById("preview");--}}
{{--                   var avatar = document.getElementById("avatar");--}}
{{--                   var avatar_name = document.getElementById("name");--}}
{{--                   var avatar_name_change_box =--}}
{{--                   document.getElementById("change-name-box");--}}

{{--                   var avatars = {--}}
{{--                   srcList: {},--}}
{{--                   activeKey: 1,--}}
{{--                   add: function(_name, _src){--}}
{{--                   this.activeKey = this.srcList.length;--}}
{{--                   return (this.srcList={name: _name, src: encodeURIComponent(_src)});--}}
{{--               },--}}

{{--               };--}}

{{--                   function showAvatar(key) {--}}
{{--                   if ( !key ) {--}}
{{--                   key = avatars.activeKey;--}}
{{--               }--}}

{{--               }--}}

{{--                   /*--}}

{{--                   /** Handle uploading of files */--}}
{{--                   upload.addEventListener("change", handleFiles, false);--}}
{{--                   function handleFiles() {--}}

{{--                   var files = this.files;--}}
{{--                   for (var i = 0; i < files.length; i++) {--}}
{{--                   var file = files[i];--}}
{{--                   var imageType = /^image\//;--}}

{{--                   if (!imageType.test(file.type)) {--}}
{{--                   avatar.classList.add("avatar--upload-error");--}}
{{--                   setTimeout(function(){--}}
{{--                   avatar.classList.remove("avatar--upload-error");--}}
{{--               },1200);--}}
{{--                   continue;--}}
{{--               }--}}

{{--                   avatar.classList.remove("avatar--upload-error");--}}

{{--                   while(preview.firstChild) {--}}
{{--                   preview.removeChild(preview.firstChild);--}}
{{--               }--}}

{{--                   var img = document.createElement("img");--}}
{{--                   img.file = file;--}}
{{--                   img.src = window.URL.createObjectURL(file);--}}
{{--                   img.onload = function() {--}}
{{--                   // window.URL.revokeObjectURL(this.src);--}}
{{--               }--}}
{{--                   img.className ="avatar_img";--}}

{{--                   /* Clear focus and any text editing mode */--}}
{{--                   document.activeElement.blur();--}}
{{--                   window.getSelection().removeAllRanges();--}}

{{--                   var _avatarKey = avatars.add(file.name, img.src);--}}
{{--                   avatar_name.textContent = file.name;--}}
{{--                   avatar_name.setAttribute("data-key", _avatarKey);--}}
{{--                   preview.appendChild(img);--}}
{{--               }--}}
{{--               }--}}

{{--                   /** Inline functions */--}}


{{--                   window.changeAvatar = function(dir){--}}
{{--                   if ( dir === 'next' ) {--}}
{{--                   avatars.showNext();--}}
{{--               }--}}
{{--                   else {--}}
{{--                   avatars.showLast();--}}
{{--               }--}}
{{--               };--}}
{{--                   window.handleAriaUpload = function(e, obj) {--}}
{{--                   if(e.keyCode == 13) {--}}
{{--                   obj.click();--}}
{{--               }--}}
{{--               };--}}


{{--           </script>--}}

@endsection
