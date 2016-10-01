<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use DB;
use App\User;

class ContactController extends AppBaseController
{
    /** @var  ContactRepository */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    /**
     * Display a listing of the Contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactRepository->pushCriteria(new RequestCriteria($request));
        $contacts = $this->contactRepository->paginate(15);
        $counter = 1;

        return view('contacts.index',compact(
            'counter',
            'contacts'
        ));
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     */
    public function create()
    {
        $leadsource = DB::table('codelookups')->where('typename','LEADSOURCE')->pluck('string','code');
        $users = User::all()->pluck('full_name','id');
        return view('contacts.create', compact(
            'leadsource',
            'slctdLeadSource',
            'users'
        ));
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        $input = $request->all();

        $input['full_name'] = $request['first_name'].' '.$request['mi'].'. '.$request['last_name'];

        $contact = $this->contactRepository->create($input);

        Flash::success('Contact saved successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);
        /* update field notifications when open for read */
        Contact::find($id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        $leadsource = DB::table('codelookups')->where('typename','LEADSOURCE')->where('code',$contact->lead_source)->first();

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('contacts.show',compact(
            'contact',
            'leadsource'
        ));
    }

    /**
     * Show the form for editing the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        /* update field notifications when open for read */
        Contact::find($id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        $leadsource = DB::table('codelookups')->where('typename','LEADSOURCE')->pluck('string','string2');
        $slctdLeadSource = DB::table('contacts')->where('id',$id)->pluck('lead_source');

        $users = User::all()->pluck('full_name','id');
        $slctdUser = $contact['assigned_to'];

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('contacts.edit',compact(
            'contact',
            'leadsource',
            'slctdLeadSource',
            'users',
            'slctdUser'
        ));
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param  int              $id
     * @param UpdateContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactRequest $request)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $contact = $this->contactRepository->update($request->all(), $id);

        Flash::success('Contact updated successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified Contact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $this->contactRepository->delete($id);

        Flash::success('Contact deleted successfully.');

        return redirect(route('contacts.index'));
    }

    public function modal(){
        $contacts = $contacts = $this->contactRepository->paginate(15);

        return view( 'modals.content.contacts', compact(
            'contacts'
        ));
    }
}
