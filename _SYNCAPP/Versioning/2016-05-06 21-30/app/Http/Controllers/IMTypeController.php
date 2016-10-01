<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIMTypeRequest;
use App\Http\Requests\UpdateIMTypeRequest;
use App\Repositories\IMTypeRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IMTypeController extends AppBaseController
{
    /** @var  IMTypeRepository */
    private $iMTypeRepository;

    public function __construct(IMTypeRepository $iMTypeRepo)
    {
        $this->iMTypeRepository = $iMTypeRepo;
    }

    /**
     * Display a listing of the IMType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->iMTypeRepository->pushCriteria(new RequestCriteria($request));
        $iMTypes = $this->iMTypeRepository->paginate(15);
        $counter = 1;
        return view('iMTypes.index',compact(
            'counter',
            'iMTypes'
        ));
    }

    /**
     * Show the form for creating a new IMType.
     *
     * @return Response
     */
    public function create()
    {
        return view('iMTypes.create');
    }

    /**
     * Store a newly created IMType in storage.
     *
     * @param CreateIMTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateIMTypeRequest $request)
    {
        $input = $request->all();

        $iMType = $this->iMTypeRepository->create($input);

        Flash::success('IMType saved successfully.');

        return redirect(route('iMTypes.index'));
    }

    /**
     * Display the specified IMType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $iMType = $this->iMTypeRepository->findWithoutFail($id);

        if (empty($iMType)) {
            Flash::error('IMType not found');

            return redirect(route('iMTypes.index'));
        }

        return view('iMTypes.show',compact(
            'iMType'
        ));
    }

    /**
     * Show the form for editing the specified IMType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $iMType = $this->iMTypeRepository->findWithoutFail($id);

        if (empty($iMType)) {
            Flash::error('IMType not found');

            return redirect(route('iMTypes.index'));
        }

        return view('iMTypes.edit',compact(
            'iMType'
        ));
    }

    /**
     * Update the specified IMType in storage.
     *
     * @param  int              $id
     * @param UpdateIMTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIMTypeRequest $request)
    {
        $iMType = $this->iMTypeRepository->findWithoutFail($id);

        if (empty($iMType)) {
            Flash::error('IMType not found');

            return redirect(route('iMTypes.index'));
        }

        $iMType = $this->iMTypeRepository->update($request->all(), $id);

        Flash::success('IMType updated successfully.');

        return redirect(route('iMTypes.index'));
    }

    /**
     * Remove the specified IMType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $iMType = $this->iMTypeRepository->findWithoutFail($id);

        if (empty($iMType)) {
            Flash::error('IMType not found');

            return redirect(route('iMTypes.index'));
        }

        $this->iMTypeRepository->delete($id);

        Flash::success('IMType deleted successfully.');

        return redirect(route('iMTypes.index'));
    }
}
