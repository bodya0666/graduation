@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
      {{ $edit ? 'Edit' : 'Add' }} SiteModel Data
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
      <form method="post" action="{{ $edit ? route('siteModel.update', $siteModel->id) : route('siteModel.store') }}">
          <div class="form-group">
              @csrf
              @if ($edit)
                @method('PATCH')
              @endif
                <label for="country_name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $siteModel->name ?? null }}"/>
                <label for="country_name">Model_id:</label>
                <input type="text" class="form-control" name="model_id" value="{{ $siteModel->model_id ?? null }}"/>
          </div>
          <button type="submit" class="btn btn-primary">{{ $edit ? 'Edit' : 'Add' }} Data</button>
      </form>
  </div>
</div>
@endsection
