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
        return view('forms::index', ['fields' => Field::all(), 'types' => Type::all()]);
    }

    public function create()
    {
        $types = DB::table('types')->get();
        return view('forms::create', compact('types'));
    }

    public function store(TableStoreRequest $request)
    {
        $request->request->remove('_method');
        $request->request->remove('_token');

        $this->createTable($request);
//        dd($request);
    }

    public function mix($name, $title, $settings, $type = "text")
    {
        $form_group = file_get_contents(__DIR__ . "/parts/form-group-{$type}.blade.php");
        $html = sprintf($form_group, $name, $title, $settings);
        echo $html;
    }

    protected function createTable(TableStoreRequest $request)
    {
        $table = Table::where('name', '=', $request->get('name'))->first();
        if (empty($table)) {
            $table = Table::create([
                'name' => $request->get('name'),
                'route' => $request->get('route'),
                'model' => $request->get('model'),
            ]);

            $this->storeFields($request, $table);
        } else {
            echo "The table exist";
        }

    }

    protected function storeFields(TableStoreRequest $request, Table $table)
    {
        $names = $request->get('names');
        $titles = $request->get('titles');
        $types = $request->get('types');
        $nullable = $request->get('nullable');
        $fillable = $request->get('fillable');
        $inlist = $request->get('inlist');

        if(!empty($names)){
            $i = 0;
            foreach($names as $name){

                $data = [
                    'name' => $name,
                    'title' => $titles[$i],
                    'type_id' => $types[$i],
                    'default' => !empty($defaults[$i]) ? $defaults[$i] : '',
                    'nullable' => isset($nullable[$i]) ? 1 : 0,
                    'fillable' => isset($fillable[$i]) ? 1 : 0,
                    'inlist' => isset($inlist[$i]) ? 1 : 0,
                ];

                $field = Field::create($data);
                $table->fields()->save($field);
                $i++;
            }
        }

    }
}
