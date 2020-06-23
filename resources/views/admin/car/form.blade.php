@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
      {{ $edit ? 'Edit' : 'Add' }} Car Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ $edit ? route('car.update', $car->id) : route('car.store') }}">
          <div class="form-group">
              @csrf
              @if ($edit)
                @method('PATCH')
              @endif        <label for="country_name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $car->name ?? null }}"/>        <label for="country_name">Price:</label>
        <input type="text" class="form-control" name="price" value="{{ $car->price ?? null }}"/>        <label for="country_name">Url:</label>
        <input type="text" class="form-control" name="url" value="{{ $car->url ?? null }}"/>        <label for="country_name">Distance:</label>
        <input type="text" class="form-control" name="distance" value="{{ $car->distance ?? null }}"/>        <label for="country_name">Gear:</label>
        <input type="text" class="form-control" name="gear" value="{{ $car->gear ?? null }}"/>        <label for="country_name">Fuel:</label>
        <input type="text" class="form-control" name="fuel" value="{{ $car->fuel ?? null }}"/>        <label for="country_name">Engine:</label>
        <input type="text" class="form-control" name="engine" value="{{ $car->engine ?? null }}"/>        <label for="country_name">Location:</label>
        <input type="text" class="form-control" name="location" value="{{ $car->location ?? null }}"/>        <label for="country_name">Equipment:</label>
        <input type="text" class="form-control" name="equipment" value="{{ $car->equipment ?? null }}"/>        <label for="country_name">Description:</label>
        <input type="text" class="form-control" name="description" value="{{ $car->description ?? null }}"/>        <label for="country_name">Year:</label>
        <input type="text" class="form-control" name="year" value="{{ $car->year ?? null }}"/>        <label for="country_name">Site_id:</label>
        <input type="text" class="form-control" name="site_id" value="{{ $car->site_id ?? null }}"/>        <label for="country_name">Site_brand_id:</label>
        <input type="text" class="form-control" name="site_brand_id" value="{{ $car->site_brand_id ?? null }}"/>        <label for="country_name">Site_model_id:</label>
        <input type="text" class="form-control" name="site_model_id" value="{{ $car->site_model_id ?? null }}"/>          </div>
          <button type="submit" class="btn btn-primary">{{ $edit ? 'Edit' : 'Add' }} Data</button>
      </form>
  </div>
</div>
@endsection