<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Course_userRequest;
use App\Models\Course_user;
use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Courses;

/**
 * Class Course_userCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Course_userCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Course_user::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course_user');
        CRUD::setEntityNameStrings('course_users', 'course_users');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        CRUD::addColumn(['name' => 'username','label'=>'کاربر']);
        CRUD::addColumn(['name' => 'couresname','label'=>'دوره']);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         */
       // CRUD::addColumn(['name' => 'price', 'type' => 'number']);

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(Course_userRequest::class);

        // CRUD::setFromDb(); // fields


        $this->crud->addField([
            'name' => 'user_id',
            'label' => 'کاربر',
            'type' => 'select2',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => 'App\User',

        ]);
        $this->crud->addField([
            'name' => 'coures_id',
            'label' => 'دوره',
            'type' => 'select2',
            'entity' => 'course',
            'attribute' => 'name',
            'model' => 'App\Models\Courses',

        ]);
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

    public function store()
    {
        $pivot = new Course_user();
        $pivot->user_id = request()->user_id;
        $pivot->course_id = request()->coures_id;
        $pivot->username = User::find(request()->user_id)->name;
        $pivot->couresname = Courses::find(request()->coures_id)->name;
        $pivot->save();


        return redirect()->to('ava/course_user');
    }
}