@extends('pages.parent.layouts.parent-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>

    </div>
@endsection
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Managment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div>
                        <p class="text-left">Choose Student</p>

                        <div class="modal-body max-height-vh-60" style="overflow-y:auto">
                            @foreach($parents_us as $p)
                            <div class="list-group mb-1">
                                <div href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10px;">
                    <span >
                      <span class="text-dark text-bold">{{$p->user->student_name}}</span><br/>
                      <span>{{$p->user->username}}</span>
                      <span>{{$p->user->level_id}}</span>
                    </span>

                                            <br/>
                                        </div>
                                        <div class="col-5 text-end mt-2">
                                            <a  class="text-secondary font-weight-bold text-xs"  href="/parent/index/{{$p->id}}" role="button">
                                                <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        function showUser(id){
            axios({
                method:'get',
                url:'/parent/index/' + id + '/show'
            })
            var newWindow = window.open('/parent/index/' +id);
            newWindow.my_childs_special_setting = $('#title').val(response.data.title);

        }
    </script>

@endsection
