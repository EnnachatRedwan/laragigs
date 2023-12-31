<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(){        
        return view('listings.index',[
            'listings'=> Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }

    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=> $listing
        ]);
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
        'email'=>['required','email'/*,Rule::unique('listings','email')*/],
            'website'=>['required','url'],
            'tags'=>'required',
            'description'=>'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }


        $formFields['user_id']=auth()->user()->id;
        

        Listing::create($formFields);

        return redirect('/')->with('message','Listing added successfully');
    }

    public function edit(Listing $listing){
        return view('listings.edit',['listing'=>$listing]);
    }

    public function update(Request $request, Listing $listing){
        if($listing->user()->get()[0]->id != auth()->user()->id){
            abort(403,'Unauthorized action');
        }
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'email'=>['required','email'/*,Rule::unique('listings','email')*/],
            'website'=>['required','url'],
            'tags'=>'required',
            'description'=>'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);

        return back()->with('message','Listing updated successfully');
    }

    public function destroy(Listing $listing){
        if($listing->user()->get()[0]->id != auth()->user()->id){
            abort(403,'Unauthorized action');
        }
        $listing->delete();
        return redirect('/')->with('message','Listing was deleted successfully');
    }

    public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
    }
}
