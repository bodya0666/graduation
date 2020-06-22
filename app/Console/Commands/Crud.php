<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Crud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $model;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modelName = 'siteModel';

        $uperModelName = ucfirst($modelName);

        $model = "App\\$uperModelName";
        $this->model = new $model;

        file_put_contents(__DIR__ . "/../../Http/Controllers/Admin/{$uperModelName}Controller.php", $this->controllerLayout($uperModelName, $modelName));
        $viewPath = __DIR__ . "/../../../resources/views/admin/$modelName";
        if (!file_exists($viewPath)) {
            mkdir($viewPath);
        }

//        file_put_contents($viewPath . '/index.blade.php', $this->indexLayout($modelName));
//        file_put_contents($viewPath . '/form.blade.php', $this->formLayout($modelName, $uperModelName));

    }

    protected function indexLayout($modelName)
    {
        $part1 = <<<HTML
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
  <a class="btn btn-primary" href="{{ route('$modelName.create')}}" role="button">Create</a>
  <div class="mb-2"></div>
  <table class="table table-striped">
    <thead>
        <tr>
HTML;
        $part2 = null;
        $part3 = <<<HTML
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach(\${$modelName}s as \$$modelName)
        <tr>
HTML;
        $part4 = null;
        $part5 = <<<HTML
            <td><a href="{{ route('$modelName.edit', \${$modelName}->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('$modelName.destroy', \${$modelName}->id)}}" method="post">
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
HTML;

        $part2 .= "\n<td>ID</td>";
        $part4 .= "\n<td>{{\${$modelName}->id}}</td>";
        foreach ($this->model->fillable as $key => $attribute)
        {
            $label = ucfirst($attribute);
            $part2 .= "\n<td>$label</td>";
            $part4 .= "\n<td>{{\$$modelName->$attribute}}</td>";
        }

        return $part1 . $part2 . $part3 . $part4 . $part5;
    }

    protected function formLayout($modelName, $uperModelName)
    {
        $part1 = <<<HTML
@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
      {{ \$edit ? 'Edit' : 'Add' }} $uperModelName Data
  </div>
  <div class="card-body">
    @if (\$errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach (\$errors->all() as \$error)
              <li>{{ \$error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ \$edit ? route('$modelName.update', \${$modelName}->id) : route('$modelName.store') }}">
          <div class="form-group">
              @csrf
              @if (\$edit)
                @method('PATCH')
              @endif
HTML;
        $part2 = null;

        $part3 = <<<HTML
          </div>
          <button type="submit" class="btn btn-primary">{{ \$edit ? 'Edit' : 'Add' }} Data</button>
      </form>
  </div>
</div>
@endsection
HTML;

        foreach ($this->model->fillable as $key => $attribute)
        {
            $label = ucfirst($attribute);
            $part2 .= <<<HTML
        <label for="country_name">$label:</label>
        <input type="text" class="form-control" name="$attribute" value="{{ \$$modelName->$attribute ?? null }}"/>
HTML;
        }

        return $part1 . $part2 . $part3;
    }

    protected function controllerLayout($uperModelName, $modelName)
    {
        return <<<CODE
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\\$uperModelName;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class {$uperModelName}Controller extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        \${$modelName}s = $uperModelName::all();

        return view('admin.$modelName.index', compact('{$modelName}s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        \$edit = false;

        return view('admin.$modelName.form', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request \$request
     * @return RedirectResponse|Redirector
     */
    public function store(Request \$request)
    {
        \$validatedData = \$request->validate([
            'name' => 'required|max:255',
        ]);
        \$show = $uperModelName::create(\$validatedData);

        return redirect('/admin/$modelName')->with('success', '$uperModelName Case is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  \$id
     * @return Response
     */
    public function show(\$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  \$id
     * @return Factory|View
     */
    public function edit(\$id)
    {
        \$$modelName = $uperModelName::findOrFail(\$id);
        \$edit = true;

        return view('admin.$modelName.form', compact('$modelName', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request \$request
     * @param  int  \$id
     * @return RedirectResponse|Redirector
     */
    public function update(Request \$request, \$id)
    {
        \$validatedData = \$request->validate([
            'name' => 'required|max:255',
        ]);
        $uperModelName::whereId(\$id)->update(\$validatedData);

        return redirect('/admin/$modelName')->with('success', '$uperModelName Case Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int \$id
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(\$id)
    {
        \$$modelName = $uperModelName::findOrFail(\$id);
        \${$modelName}->delete();

        return redirect('/admin/$modelName')->with('success', '$uperModelName Case Data is successfully deleted');
    }
}
CODE;
    }
}
