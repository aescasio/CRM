<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use App\User;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;


class TaskController extends AppBaseController
{
    /** @var  TaskRepository */
    private $taskRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }

    /**
     * Display a listing of the Task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->taskRepository->pushCriteria(new RequestCriteria($request));

        $tasks = Task::where('assigned_to',\Auth::user()->id)->paginate(10);

        if(\Auth::user()->hasRole('admin')){
            $tasks = $this->taskRepository->paginate(10);
        }

        $i = $tasks->firstItem();

        return view('tasks.index',compact(
            'tasks',
            'i'
        ));
    }

    /**
     * Show the form for creating a new Task.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('tasks.create',compact(
            'assigned_to'
        ));
    }

    /**
     * Store a newly created Task in storage.
     *
     * @param CreateTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskRequest $request)
    {
        $input = $request->all();
        $input['start_date'] = date('Y-m-d H:i:s',strtotime($input['start_date'].' '.$input['start_time']));
        $input['due_date'] = date('Y-m-d H:i:s',strtotime($input['due_date'].' '.$input['due_time']));

        $task = $this->taskRepository->create($input);

        Flash::success('Task saved successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);
        Task::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);
        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.show',compact(
            'task'
        ));
    }

    /**
     * Show the form for editing the specified Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);
/*
        if($task->related_to == 'accounts'){
            $results = \App\Models\Account::where('id',$task->related_result)->first();
            $related_results_dummy = $results->name;
        }elseif($task->related_to == 'contacts'){
            $results = \App\Models\Contact::where('id',$task->related_result)->first();
            $related_results_dummy = $results->salutation.'. '.$results->full_name;
        }elseif($task->related_to == 'leads'){
            $results = \App\Models\Lead::where('id',$task->related_result)->first();
            $related_results_dummy = $results->salutation .'. '.$results->first_name. ' '. $results->last_name;
        }elseif($task->related_to == 'opportunities'){
            $results = \App\Models\Opportunities::where('id',$task->related_result)->first();
            $related_results_dummy = $results->name;
        }elseif($task->related_to == 'targets'){
            $results = \App\Models\Target::where( 'id' , $task->related_result )->first();
            $related_results_dummy = $results->salutation . '. ' . $results->first_name . ' ' . $results->last_name;
        }elseif($task->related_to == 'tasks'){
            $results = \App\Models\Task::where( 'id' , $task->related_result )->first();
            $related_results_dummy = $results->subject;
        }elseif($task->related_to == 'projects'){
            $results = \App\Models\Project::where( 'id' , $task->related_result )->first();
            $related_results_dummy = $results->name;
        }*/

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('tasks.edit',compact(
            'task',
            'assigned_to',
            'related_results_dummy'
        ));
    }

    /**
     * Update the specified Task in storage.
     *
     * @param  int              $id
     * @param UpdateTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskRequest $request)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $input = $request->all();
        $input['start_date'] = date('Y-m-d H:i:s',strtotime($input['start_date'].' '.$input['start_time']));
        $input['due_date'] = date('Y-m-d H:i:s',strtotime($input['due_date'].' '.$input['due_time']));

        $task = $this->taskRepository->update($input, $id);

        Flash::success('Task updated successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified Task from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $this->taskRepository->delete($id);

        Flash::success('Task deleted successfully.');

        return redirect(route('tasks.index'));
    }

    public function modal(){
        $tasks = $this->taskRepository->paginate(10);
        return view( 'modals.content.tasks', compact(
            'tasks'
        ));
    }
}
