@extends('layouts.arqueologia')
{{--@extends('adminlte::page')--}}

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content-aque')
    @include('projects.partials._menu_steps', ['step' => $step])

    <div class="mt-1"></div>
    <div class="card card-widget">
        <div class="card-header">
            <div class="user-block">
                <h4>Comentarios</h4>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body card-comments">
            @foreach($comments as $comment)
                <div class="card-comment">
                    <!-- User image -->
                    <img class="img-circle img-sm" src="{{ asset('img/user.png') }}" alt="{{ $comment->user->name }}">

                    <div class="comment-text">
                    <span class="username">
                      {{ $comment->user->name }}
                      <span class="text-muted float-right">{{ $comment->c_date }}</span>
                    </span><!-- /.username -->
                        {{ $comment->comment }}
                    </div>
                    <!-- /.comment-text -->
                </div>
            @endforeach
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <form action="{{ route('projects.comment.create', ['projectId' => $project->id, 'step' => $step]) }}" method="post">
                @csrf
                <img class="img-fluid img-circle img-sm" src="{{ asset('img/user.png') }}" alt="">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input id="iComment" type="text" class="form-control form-control-sm" name="comment"
                           placeholder="Pulse Enter para comentar el proyecto" required>
                </div>
            </form>
        </div>
        <!-- /.card-footer -->
    </div>

@endsection

@push('js')
    <script>

    </script>
@endpush

