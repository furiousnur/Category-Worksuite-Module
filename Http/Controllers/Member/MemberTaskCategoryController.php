<?php

namespace Modules\Category\Http\Controllers\Member;

use App\Helper\Reply;
use App\Http\Controllers\Admin\AdminBaseController;
use App\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\DataTables\MemberTaskCategoryDataTable;
use function GuzzleHttp\Promise\task;

class MemberTaskCategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(MemberTaskCategoryDataTable $dataTables)
    {
        if(!user()->cans('view_task_category'))
        return abort(403);

        $this->pageTitle = __('category::app.title');
        return $dataTables->render('category::member.task.index', $this->data);
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
            'category_name' => 'required|unique:task_category,category_name',
        ]);

        TaskCategory::create([
           'category_name' => $request->category_name
        ]);

        return redirect()->route('admin.task-category.index');
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

        if(!user()->cans('edit_task_category'))
        return abort(403);

        $task = TaskCategory::find($id);
        return response()->json($task);
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
        if(!user()->cans('delete_task_category'))
        return abort(403);

        $this->device = TaskCategory::find($id);
        $this->device->delete();
        return Reply::success(__('category::app.message.deleted'));

    }
}
