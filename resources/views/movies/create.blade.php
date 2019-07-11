@extends('layouts.base')
@section('title', 'Insert Movie')

@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
  @endif

<form method="POST" action="{{route('movies.store')}}">
  @csrf
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
  </div>
  <div class="form-group">
    <label for="plot">Plot:(optional)</label>
    <textarea name="plot" class="d-block" rows="8" cols="80">{{ old('plot') }}</textarea>
  </div>
  <div class="form-group">
    <label for="image">Url Image:(optional)</label>
    <input type="url" name="img" class="d-block rounded p-2 w-75" value="{{ old('img') }}">
  </div>
  <div class="form-group">
    <label for="release">Release:</label>
    <input type="text" class="form-control w-25" name="release" value="{{ old('release') }}">
  </div>
  <select class="form-control" name="genre_id">
    <option value="">Seleziona il genere del film</option>
    @foreach ($genres as $genre)
    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary">Inserisci film:</button>
</form>
</div>
@endsection
