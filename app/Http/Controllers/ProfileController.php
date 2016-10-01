<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;

class ProfileController extends AppBaseController
{
    /** @var  ProfileRepository */
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the Profile.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return redirect(route('profiles.show',\Auth::user()->id));
        /*
        $this->profileRepository->pushCriteria(new RequestCriteria($request));
        $profiles = $this->profileRepository->paginate(15);
        $counter = 1;
        return view('profiles.index',compact(
            'counter',
            'profiles'
        ));
        */
    }

    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        //return view('profiles.create');
        return redirect()->back()->with('message','Go to Manage Users');
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param CreateProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateProfileRequest $request)
    {
        $input = $request->all();

        $profile = $this->profileRepository->create($input);

        Flash::success('Profile saved successfully.');

        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show',compact(
            'profile'
        ));
    }

    /**
     * Show the form for editing the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }
        return view('profiles.edit',compact(
            'profile'
        ));
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  int              $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileRequest $request)
    {
        $input = $request->all();

        $profile = $this->profileRepository->findWithoutFail($id);

        $old_pass = User::find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }
        $requests = $request->all();

        if(!empty($requests['password'])){
            $requests['password'] = bcrypt($requests['password']);
        }else{
            $requests['password'] = $old_pass->password;
        }

        if($request->hasFile('photo')){

            $photo = $request->file('photo');

            $filename = $photo->getClientOriginalName();

            $destination = public_path().'/img/profile_picture/'.$id;

            if(!is_dir($destination)){
                \File::makeDirectory($destination, 0777 ,true);
            }


            if(\File::exists($destination.'/'.User::find($id)->photo)){

                \File::delete($destination.'/'.User::find($id)->photo);
            }

            $photo->move($destination, $filename);

            $input['photo'] = $filename;
        }

        $profile = $this->profileRepository->update($input, $id);

        Flash::success('Profile updated successfully.');

        return redirect(route('profiles.show',[$id]));
    }

    /**
     * Remove the specified Profile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        return redirect()->back();

        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $this->profileRepository->delete($id);

        Flash::success('Profile deleted successfully.');

        return redirect(route('profiles.index'));
    }
}
