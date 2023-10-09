@extends('layouts.app')
@section("title", "Laravel - Add a Project")
@section('content')
<div class="container mt-5">
  <h2>Add a project!</h2>
  <form class="mt-5" action="{{ route('projects.store') }}" method="POST">
    @csrf()

    <!--Project name-->
    <div class="mb-3"><label class="form-label fw-bold">Name:</label><input type="text" class="form-control" name="name"></div>
    <!--Project Description-->
    <div class="mb-3"><label class="form-label fw-bold">Description:</label><textarea class="form-control" name="description"></textarea></div>
    <!--TProject image-->
    <div class="mb-3"><label class="form-label fw-bold">Image:</label><input type="text" class="form-control" name="image"></div>
    <!--Project url-->
    <div class="mb-3"><label class="form-label fw-bold">Link:</label><input type="text" class="form-control" name="url"></div>
    <!--Project publication date-->
    <div class="mb-3"><label class="form-label fw-bold">Creation Date:</label><input type="text" class="form-control" name="publication_time"></div>

    <a class="btn btn-secondary" href="{{ route("projects.index") }}">Cancel</a>
    <button class="btn btn-danger">Save</button>
  </form>
</div>
@endsection