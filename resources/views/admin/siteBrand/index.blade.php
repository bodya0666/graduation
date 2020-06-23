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
  <a class="btn btn-primary" href="{{ route('siteBrand.create')}}" role="button">Create</a>
  <div class="mb-2"></div>
  <table class="table table-striped">
    <thead>
        <tr>
<td>ID</td>
<td>Name</td>
<td>Brand_id</td>          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($siteBrands as $siteBrand)
        <tr>
<td>{{$siteBrand->id}}</td>
<td>{{$siteBrand->name}}</td>
<td>{{$siteBrand->brand_id}}</td>            <td><a href="{{ route('siteBrand.edit', $siteBrand->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('siteBrand.destroy', $siteBrand->id)}}" method="post">
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