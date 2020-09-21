<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CoursesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CoursesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CoursesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Courses::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/courses');
        CRUD::setEntityNameStrings('courses', 'courses');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns

        CRUD::addColumn(['name' => 'name','type'=>'text','label'=>'نام']);


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
        CRUD::setValidation(CoursesRequest::class);

        // CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'name',
            'label' => 'نام',
            'type' => 'text',

        ]);

        // $this->crud->addField([
        //     'name' => 'time',
        //     'label' => 'data',
        //     'type' => 'date',

        // ]);

        // $this->crud->addField([
        //     'name' => 'start_coures',
        //     'label' => 'start_coures',
        //     'type' => 'date',

        // ]);

        // $this->crud->addField([
        //     'name' => 'end_coures',
        //     'label' => 'end_coures',
        //     'type'  => 'date_picker',


        //     // optional:
        //     'date_picker_options' => [
        //        'todayBtn' => 'linked',
        //        'format'   => 'dd-mm-yyyy',
        //        'language' => 'fa'
        //     ],

        // ]);

        // $this->crud->addField([
        //     'name' => 'price',
        //     'label' => 'price',
        //     'type' => 'number',

        // ]);

        $this->crud->addField([
            'name' => 'user_id',
            'label' => 'مدرس دوره',
            'type' => 'select2',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => 'App\User',

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
}
