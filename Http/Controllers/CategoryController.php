<?php

namespace Modules\Category\Http\Controllers;

use App\Helper\Reply;
use App\Http\Controllers\Admin\AdminBaseController;
use App\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\DataTables\CategoryDataTable;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(CategoryDataTable $dataTables)
    {
        $this->pageTitle = __('category::app.title');
        return $dataTables->render('category::project.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:project_category,category_name',
        ]);

        ProjectCategory::create([
           'category_name' => $request->category_name
        ]);

        return redirect()->route('employee.category.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('category::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->device = ProjectCategory::find($id);
        $this->device->delete();
        return Reply::success(__('category::app.message.deleted'));

    }
}
