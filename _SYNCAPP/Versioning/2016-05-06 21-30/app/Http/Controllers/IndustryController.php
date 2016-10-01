<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryRequest;
use App\Industrytype;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Session;

class IndustryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    Public $breadcrumbs;

    public function index()
    {
        $industry_type = Industrytype::all();
        $i = 1;
        $this->breadcrumbs = array('Home', 'Industry');

        return view('industry.index', compact('industry_type', 'breadcrumbs', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('industry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IndustryRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all() );
        //$input = $request->all();

        $industry = new Industrytype;
        $industry->name = $request['name'];
        $industry->description = $request['description'];
        $industry->save();
//        flash('Save Successfully');

        flash()->success('Save Successfully');
        return redirect('industry');
        /*
        return redirect('industry')->with([
            'flash_notification' => 'Industry saved successfully.',
            'level'=> 'success'
        ]);
*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $industry = Industrytype::find($id);

        if (empty($industry))
        {
            Flash::error('Industry item not found');

            return redirect(route('industry.index'));
        }

        return view('industry.show')->with('industry', $industry);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $industry = Industrytype::find($id);

        if (empty($industry))
        {
            Flash::error('Industry not found');
            return redirect(route('industry.index'));
        }
        return view('industry.edit')->with('industry', $industry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
         * TODO: flash message edit delete and update
         */
        $industry = Industrytype::findOrFail($id);
        $industry->update($request->all());

        if (empty($industry))
        {
            Flash::error('LeadSource not found');
            return redirect(route('industry.index'));
        }

        Flash::error('Successfully updated.');
        return redirect(route('industry.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industrytype::find($id); //select the book using primary id

        if (empty($industry))
        {
            Flash::error('Industry not found');

            return redirect(route('industry.index'));
        }
        $industry->delete();

        //Flash::success('Industry deleted successfully.');
        //Flash::message('Industry deleted successfully');
        flash()->overlay('Your article has been successfully created!', 'Good Job');
        return redirect(route('industry.index'));
    }

}
