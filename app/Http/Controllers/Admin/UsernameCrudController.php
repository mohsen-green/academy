<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsernameRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use GuzzleHttp\Psr7\Request;

/**
 * Class UsernameCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsernameCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    protected $name = 'name';

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Username::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/username');
        CRUD::setEntityNameStrings('username', 'usernames');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {

        dd(backpack_user()->hasRole(''));
        CRUD::setValidation(UsernameRequest::class);

        //    CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'user_id',
            'label' => 'userid',
            'type' => 'select2',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => 'App\User',

        ]);


        // $this->crud->set('name','ok');
        //     'name' => 'name',
        //      'label' => 'name',
        //      'fake' => true,
        //     // 'entity' => 'user',
        //     // 'attribute' => 'name',
        //     // 'model' => 'App\User',
        //     // 'store_in'=>'metas'

        // ]);


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();

    }


}
