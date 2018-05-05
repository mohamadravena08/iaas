@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                @foreach ($posts as $post)
                  <div class="card-header">
                      <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a> {{ $post->created_at->diffForHumans() }}

                      <div class="pull-right">
                        <form class="" action="{{ route('post.destroy', $post)}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                        </form>
                        <a class="btn btn-xs btn-primary" href="{{ route('post.edit', $post) }}">Edit</a>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>{{ str_limit($post->content, 100, ' ...') }}</p>
                  </div>
                @endforeach
              </div>
              {!! $posts->render() !!}
          </div>
      </div>
  </div>
@endsection>
