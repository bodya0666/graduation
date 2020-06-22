@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <a class="btn btn-primary" href="{{ route('siteModel.create')}}" role="button">Create</a>
  <div class="mb-2"></div>
  <table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Model_id</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($siteModels as $siteModel)
        <tr>
            <td>{{$siteModel->id}}</td>
            <td>{{$siteModel->name}}</td>
            <td>{{$siteModel->model_id}}</td>
            <td><a href="{{ route('siteModel.edit', $siteModel->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('siteModel.destroy', $siteModel->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
