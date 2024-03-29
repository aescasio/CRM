<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientTypeRequest;
use App\Http\Requests\UpdateClientTypeRequest;
use App\Repositories\ClientTypeRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientTypeController extends AppBaseController
{
    /** @var  ClientTypeRepository */
    private $clientTypeRepository;

    public function __construct(ClientTypeRepository $clientTypeRepo)
    {
        $this->clientTypeRepository = $clientTypeRepo;
    }

    /**
     * Display a listing of the ClientType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientTypeRepository->pushCriteria(new RequestCriteria($request));
        $clientTypes = $this->clientTypeRepository->paginate(10);
        return view('clientTypes.index')
            ->with('clientTypes', $clientTypes);
    }

    /**
     * Show the form for creating a new ClientType.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientTypes.create');
    }

    /**
     * Store a newly created ClientType in storage.
     *
     * @param CreateClientTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateClientTypeRequest $request)
    {
        $input = $request->all();

        $clientType = $this->clientTypeRepository->create($input);

        Flash::success('ClientType saved successfully.');

        return redirect(route('clientTypes.index'));
    }

    /**
     * Display the specified ClientType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            Flash::error('ClientType not found');

            return redirect(route('clientTypes.index'));
        }

        return view('clientTypes.show')->with('clientType', $clientType);
    }

    /**
     * Show the form for editing the specified ClientType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            Flash::error('ClientType not found');

            return redirect(route('clientTypes.index'));
        }

        return view('clientTypes.edit')->with('clientType', $clientType);
    }

    /**
     * Update the specified ClientType in storage.
     *
     * @param  int              $id
     * @param UpdateClientTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientTypeRequest $request)
    {
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            Flash::error('ClientType not found');

            return redirect(route('clientTypes.index'));
        }

        $clientType = $this->clientTypeRepository->update($request->all(), $id);

        Flash::success('ClientType updated successfully.');

        return redirect(route('clientTypes.index'));
    }

    /**
     * Remove the specified ClientType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            Flash::error('ClientType not found');

            return redirect(route('clientTypes.index'));
        }

        $this->clientTypeRepository->delete($id);

        Flash::success('ClientType deleted successfully.');

        return redirect(route('clientTypes.index'));
    }
}
