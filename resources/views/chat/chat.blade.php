@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Chat')
@section('page','Chat')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
<!-- Chat box -->
      <div  !important;" class="box box-success">
          <div class="box-header">
            <i class="fa fa-comments-o"></i>
            <h3 class="box-title">Chat</h3>
            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
              <div class="btn-group" data-toggle="btn-toggle" >
                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
              </div>
            </div>
          </div>
          <div style="height: 300px; overflow: auto;" class="box-body chat" id='scrollableDiv' >
            <!-- chat item -->
            @php $q='00-00-0000' @endphp
            @foreach ($messages as $message)
            @if ($q!==$message->created_at->format('d-m-Y'))
            <hr>
                <p style="text-align: center">{{$message->created_at->format('d-m-Y')}}</p>
                <hr>
            @endif
              <div class="item">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" alt="user image" class="online"/>
                
                <p  class="message">
                  <a href="#" class="name">
                    
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$message->created_at->format('H:i')}}</small>
                    @if ($message->user->id==auth()->user()->id)
                    Siz
                    @else
                    {{$message->user->name}}
                    @endif
                  </a>
                  {{$message->message}}
                </p>
              
                
              </div><!-- /.item -->
              @php $q=$message->created_at->format('d-m-Y') @endphp
            @endforeach
          </div><!-- /.chat -->
          <div class="box-footer">
            <form action="{{route('chat.store')}}" method="POST">
              @csrf
              <div class="input-group">
                <input name="message" class="form-control" autocomplete="off" placeholder="Xabar kiritish..."/>
                <div class="input-group-btn">
                  <button style="" type="submit" class="btn btn-success"><i style="font-size: 20px" class="fa fa-plus"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.box (chat box) -->
    </div>
  </div>
</section>
@endsection
<script>
  window.onload = function() {
    var scrollableDiv = document.getElementById('scrollableDiv');
    scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
};
</script>