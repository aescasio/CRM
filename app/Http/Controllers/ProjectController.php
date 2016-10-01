<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Project;
use Auth;
use App\User;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->projectRepository->pushCriteria(new RequestCriteria($request));

        $projects = Project::where('project_manager',Auth::user()->id)->paginate(10);

        if(Auth::user()->hasRole(['admin'])){
            $projects = $this->projectRepository->paginate(10);
        }

        $i = $projects->firstItem();

        return view('projects.index',compact(
            'projects',
            'i'
        ));
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {

        if(Auth::user()->hasRole('admin')){
            $users = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('projects.create',compact(
            'users'
        ));
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        Project::where('id',$id)->where('project_manager',\Auth::user()->id)->update(['notifications'=>false]);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show',compact(
            'project'
        ));
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        Project::where('id',$id)->where('project_manager',\Auth::user()->id)->update(['notifications'=>false]);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        if(Auth::user()->hasRole('admin')){
            $users = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('projects.edit',compact(
            'project',
            'users'
        ));
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int              $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }

    public function modal(){
        $projects = $this->projectRepository->paginate(10);
        return view( 'modals.content.projects', compact(
            'projects'
        ));
    }

}
