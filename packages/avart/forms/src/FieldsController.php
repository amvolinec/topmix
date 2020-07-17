<?php

namespace Avart\Forms;

use App\Http\Controllers\Controller;
use Avart\Forms\Field;
use Avart\Forms\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Avart\Forms\Type;

class FieldsController extends Controller
{
    public function index()
    {
        return view('forms::index', ['tables' => Table::all(), 'types' => Type::all()]);
    }

    public function create()
    {
        $types = DB::table('types')->get();
        return view('forms::create', compact('types'));
    }

    public function edit($name)
    {
        $table = Table::with('fields')->where('route', '=', $name)->firstOrFail();
        $types = DB::table('types')->get();
        return view('forms::create', ['types' => $types, 'table' => $table, 'fields' => $table->fields]);
    }

    public function store(TableStoreRequest $request)
    {
        $this->createTable($request);
        return redirect()->route('forms.index');
    }

    public function mix($name, $title, $settings, $type = "text")
    {
        $form_group = file_get_contents(__DIR__ . "/parts/form-group-{$type}.blade.php");
        $html = sprintf($form_group, $name, $title, $settings);
        echo $html;
    }

    public function getIndex($table)
    {
        $data = Table::where('name', '=', $table)->first();
        if (!empty($table)) {
            $fields = $data->fields;
            $creator = new TableCreator($data->name, $data->route, $fields);
            $html = $creator->get();
        } else {
            $html = "Table not found";
        }

        dd($html);
    }

    protected function update($name, Request $request)
    {
        $table = Table::where('route', '=', $name)->firstOrFail();
        $table->name = $request->get('name');
        $table->route = $request->get('route');
        $table->model = $request->get('model');
        $table->create_model = $request->has('create_model') ? 1 : 0;
        $table->create_migration = $request->has('create_migration') ? 1 : 0;
        $table->create_controller = $request->has('create_controller') ? 1 : 0;
        $table->create_views = $request->has('create_views') ? 1 : 0;
        $table->create_permissions = $request->has('create_permissions') ? 1 : 0;
        $table->save();

        $this->storeFields($request, $table);

        return redirect()->route('forms.index');
    }

    protected function createTable(TableStoreRequest $request)
    {
        $table = Table::where('name', '=', $request->get('name'))->first();
        if (empty($table)) {
            $table = Table::create([
                'name' => $request->get('name'),
                'route' => $request->get('route'),
                'model' => $request->get('model'),
                'create_model' => $request->has('create_model') ? 1 : 0,
                'create_migration' => $request->has('create_migration') ? 1 : 0,
                'create_controller' => $request->has('create_controller') ? 1 : 0,
                'create_views' => $request->has('create_views') ? 1 : 0,
                'create_permissions' => $request->has('create_permissions') ? 1 : 0
            ]);

            $this->storeFields($request, $table);
        }
        redirect()->route('forms.index');
    }

    protected function storeFields($request, Table $table)
    {
        $ids = $request->has('ids') ? $request->get('ids') : false;
        $names = $request->get('names');
        $titles = $request->get('titles');
        $types = $request->get('types');
        $defaults = $request->get('defaults');
        $nullable = $request->get('nullable');
        $fillable = $request->get('fillable');
        $inlist = $request->get('inlist');

        if (!empty($names)) {
            $i = 0;
            foreach ($names as $name) {

                $data = [
                    'name' => $name,
                    'title' => $titles[$i],
                    'type_id' => $types[$i],
                    'default' => !empty($defaults[$i]) ? $defaults[$i] : null,
                    'nullable' => isset($nullable[$i]) ? 1 : 0,
                    'fillable' => isset($fillable[$i]) ? 1 : 0,
                    'inlist' => isset($inlist[$i]) ? 1 : 0,
                ];

                if (isset($ids[$i])) {
                    $id = (int)$ids[$i];
                    $field = Field::find($id);
                    $field->fill($data);
                    $field->save();
                } else {
                    $field = Field::create($data);
                    $table->fields()->save($field);
                }

                $i++;
            }
        }

    }
}
