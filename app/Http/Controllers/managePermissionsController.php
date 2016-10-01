<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemanagePermissionsRequest;
use App\Http\Requests\UpdatemanagePermissionsRequest;
use App\Repositories\managePermissionsRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class managePermissionsController extends AppBaseController
{
    /** @var  managePermissionsRepository */
    private $managePermissionsRepository;

    public function __construct(managePermissionsRepository $managePermissionsRepo)
    {
        $this->managePermissionsRepository = $managePermissionsRepo;
    }

    /**
     * Display a listing of the managePermissions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->managePermissionsRepository->pushCriteria(new RequestCriteria($request));
        $managePermissions = $this->managePermissionsRepository->paginate(15);
        $counter = 1;
        return view('managePermissions.index',compact(
            'counter',
            'managePermissions'
        ));
    }

    /**
     * Show the form for creating a new managePermissions.
     *
     * @return Response
     */
    public function create()
    {
        return view('managePermissions.create');
    }

    /**
     * Store a newly created managePermissions in storage.
     *
     * @param CreatemanagePermissionsRequest $request
     *
     * @return Response
     */
    public function store(CreatemanagePermissionsRequest $request)
    {
        $input = $request->all();

        $managePermissions = $this->managePermissionsRepository->create($input);

        Flash::success('managePermissions saved successfully.');

        return redirect(route('managePermissions.index'));
    }

    /**
     * Display the specified managePermissions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $managePermissions = $this->managePermissionsRepository->findWithoutFail($id);

        if (empty($managePermissions)) {
            Flash::error('managePermissions not found');

            return redirect(route('managePermissions.index'));
        }

        return view('managePermissions.show',compact(
            'managePermissions'
        ));
    }

    /**
     * Show the form for editing the specified managePermissions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $managePermissions = $this->managePermissionsRepository->findWithoutFail($id);

        if (empty($managePermissions)) {
            Flash::error('managePermissions not found');

            return redirect(route('managePermissions.index'));
        }

        return view('managePermissions.edit',compact(
            'managePermissions'
        ));
    }

    /**
     * Update the specified managePermissions in storage.
     *
     * @param  int              $id
     * @param UpdatemanagePermissionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemanagePermissionsRequest $request)
    {
        $managePermissions = $this->managePermissionsRepository->findWithoutFail($id);

        if (empty($managePermissions)) {
            Flash::error('managePermissions not found');

            return redirect(route('managePermissions.index'));
        }

        $managePermissions = $this->managePermissionsRepository->update($request->all(), $id);

        Flash::success('managePermissions updated successfully.');

        return redirect(route('managePermissions.index'));
    }

    /**
     * Remove the specified managePermissions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $managePermissions = $this->managePermissionsRepository->findWithoutFail($id);

        if (empty($managePermissions)) {
            Flash::error('managePermissions not found');

            return redirect(route('managePermissions.index'));
        }

        $this->managePermissionsRepository->delete($id);

        Flash::success('managePermissions deleted successfully.');

        return redirect(route('managePermissions.index'));
    }
}
