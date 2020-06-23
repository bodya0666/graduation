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
  <a class="btn btn-primary" href="{{ route('car.create')}}" role="button">Create</a>
  <div class="mb-2"></div>
  <table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Url</td>
            <td>Distance</td>
            <td>Gear</td>
            <td>Fuel</td>
            <td>Engine</td>
            <td>Year</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
            <td>{{$car->price}}</td>
            <td>{{$car->url}}</td>
            <td>{{$car->distance}}</td>
            <td>{{$car->gear}}</td>
            <td>{{$car->fuel}}</td>
            <td>{{$car->engine}}</td>
            <td>{{$car->year}}</td>
            <td><a href="{{ route('car.edit', $car->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('car.destroy', $car->id)}}" method="post">
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
