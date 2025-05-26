{{--@extends('layouts.arqueologia')--}}
@extends('adminlte::page')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
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
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="https://randomuser.me/api/portraits/men/19.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                      Maria Gonzales
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="https://randomuser.me/api/portraits/men/17.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                      Luna Stark
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <form action="#" method="post">
                <img class="img-fluid img-circle img-sm" src="https://randomuser.me/api/portraits/men/16.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
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

