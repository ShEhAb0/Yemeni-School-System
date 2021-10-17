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
                    <form id="lesson-form" method="POST" action="/attendance" target="_blank">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="lesson" value="{{$lesson->id}}">
                        <input type="hidden" name="subject" value="{{$lesson->subject_id}}">
                        <input type="hidden" name="term" value="{{$lesson->term_id}}">
                        <input type="hidden" name="date" value="{{$lesson->created_at}}">
                        <button type="submit" class="btn btn-primary w-100 btn-sm mb-0">Go To Lesson</button>
                    </form>
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
