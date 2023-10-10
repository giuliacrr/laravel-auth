@extends('layouts.app')

@section('content')
<div>
  <div class="container container-home position-relative">
    <div class="position-absolute position-set">
      <button class="text-uppercase fw-bold fs-4 p-3" type="button">
        current series
      </button>
    </div>
    <div>
      <div class="d-flex flex-wrap custom-style">
        
        
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset('storage/' . $project->image)}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$project['name']}}</h5>
                <p class="card-text">{{$project['description']}}</p>
                <p class="card-text">{{$project['url']}}</p>
                <p class="card-text"><small class="text-body-secondary">{{$project['publication_time']->format("d/m/Y")}}</small></p>
                <div><a href="{{ route('projects.show', $project['slug']) }}"><button class="btn btn-danger">Delete</button></a></div>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <div class="text-center mb-3">
      
    </div>
  </div>
</div>

@endsection