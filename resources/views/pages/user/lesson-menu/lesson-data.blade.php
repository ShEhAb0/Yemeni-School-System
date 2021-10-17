@if($lessons->count() > 0)
    <div class="p-3 d-flex justify-content-around max-height-vh-100 mb-5"
         style="flex-wrap: wrap;overflow-y: auto; background-color: #f4f5f6;">
        @foreach($lessons as $lesson)
            <div class="card card-body m-1" style="width:31.33333%;" id="cols">
                <div class="p-2">
                    <h5 class="card-title">{{$lesson->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$lesson->teacher->teacher_name}}</h6>
                    <p class="text-sm">Upload Date: {{$lesson->created_at}}</p>
                    <p class="card-text">{{$lesson->description}}</p>
                    <a class="btn btn-primary w-100 btn-sm mb-0" href="/user/lesson/{{$lesson->id}}">Go To Lesson</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination justify-content-center my-3">
        {{$lessons->render()}}
    </div>
@else
    <div class="text-center text-danger py-3">
        There are no lessons for this subject yet ..!
    </div>
@endif
