<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // home page
    public function index(){
        return view('listings.manage',[
            'listings'=> auth()->user()->listings()->get()
         ]);
    }

    
    //create a new listing
    public function create(){
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request)
      {
          // Validate the request
          $formFields = $request->validate([
              'name' => 'required',
              'subject' => 'required',
              'marks' => 'required|numeric|between:0,100'
          ]);
      
          // Add the authenticated user's ID to the form fields
          $formFields['user_id'] = auth()->id();
      
          // Attempt to find a record with the same name and subject
          $listing = Listing::where('name', $formFields['name'])
                            ->where('subject', $formFields['subject'])
                            ->first();
      
          if ($listing) {
              // Update the existing record's mark
              $listing->update(['marks' => $formFields['marks']]);
              // Flash message for updating
              $message = 'Listing Updated Successfully!';
          } else {
              // Create a new record
              Listing::create($formFields);
              // Flash message for creating
              $message = 'Listing Created Successfully!';
          }
      
          // Redirect with a flash message
          return redirect(url('/'))->with('message', $message);
    }
      

    //show edit form
    public function edit(Listing $listing){
        // dd($listing->title);
        return view('listings.edit',[
            'listing'=>$listing
        ]);

    }


      //update listing data
    public function update(Request $request,Listing $listing){

        if($listing->user_id != auth()->id()){
         abort(403, 'Unauthorizes Action');
        }

        $formFields= $request->validate([
            'name'=>'required',
            'subject'=>'required',
           'marks' => 'required|numeric|between:0,100'
        ]);

         $listing->update($formFields);

         //flash messages(POP UP)
         return  redirect(url('/'))->with('message', 'Listing Updated Successfully!');

        
    }

    public function destroy(Listing $listing){

        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorizes Action');
        }
        $listing->delete();

        return redirect(url('/'))->with('message','Listing Deleted Successfully');

    }

}
