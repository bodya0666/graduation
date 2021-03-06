@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
      {{ $edit ? 'Edit' : 'Add' }} Model Data
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
      <form method="post" action="{{ $edit ? route('model.update', $model->id) : route('model.store') }}">
          <div class="form-group">
              @csrf
              @if ($edit)
                @method('PATCH')
              @endif
              <label for="country_name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $model->name ?? null }}"/>
              <label for="country_name">Brand ID:</label>
              <input type="text" class="form-control" name="name" value="{{ $model->brand_id ?? null }}"/>
          </div>
          <button type="submit" class="btn btn-primary">{{ $edit ? 'Edit' : 'Add' }} Data</button>
      </form>
  </div>
</div>
@endsection
