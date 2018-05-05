@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ $post ->title}} | {{$post->category->name }}
        </div>
        <div class="card-body">
          <p>{{ $post->content }}</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          Tambahkan Komentar
        </div>

        @foreach ($post->comments()->get() as $comment)
        <div class="card-body">
          <h3>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h3>
          <p>{{ $comment->message }}</p>
        </div>
        @endforeach
        <div class="card-body">
          <form class="form-horizontal" action="{{ route('post.comment.store', $post) }}" method="post">
          {{ csrf_field() }}
            <div class="form-group">
              <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan komentar"></textarea>
            </div>

            <div class="form-group">
              <input type="submit" value="Komentar" class="btn btn-primary">
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
