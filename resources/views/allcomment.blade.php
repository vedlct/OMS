
<form method="post" action="{{route('insertjobcomment',['job_id'=>$job_id])}}">
    {{csrf_field()}}

    <div class="form-group" style="overflow:auto;width: 100%;height: 200px">
        @foreach($jobcomment as $comment)
            @if($comment->sender =='Admin')
                <div align="left"><span style="color: red">Admin</span>
            <pre style="border: none"><?php echo $comment->sms ?></pre><hr>
                </div>
            @else

            <div align="right"><span style="color: blue">User</span>
                <pre style="border: none"><?php echo $comment->sms ?></pre><hr>
            </div>

        @endif
        @endforeach

    </div>

    <div class="form-group">
        <div class="message_write">
            <textarea class="form-control" name="sms" placeholder="type message"></textarea>

            {{--<div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>--}}
                    {{--Add Files</a>--}}

            {{--</div>--}}

        </div>
    </div>
    <div class="form-group" align="right">
        <button type="submit" class="btn btn-success ">Submit</button>
    </div>
</form>

