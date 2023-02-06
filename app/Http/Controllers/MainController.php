<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class MainController extends Controller
{
    public function home(){
        
        $peoples = Person::orderBy('created_at','DESC') ->get() ;

        $data = ["peoples" => $peoples];
        return view('pages.home',$data);
    }
    public function singlePerson(Person $person){

        return view('pages.single', compact('person'));
    }
    public function deletePerson(Person $person){
        $person -> delete();
        return redirect() -> route('person.home');
    }
    public function addNew(){
        
        return view('pages.addNew');
    }
    public function addStore(Request $request){
        // da validare dopo
        $data = $request ->validate([
            'firstName' => 'required|max:32',
            'lastName' => 'required|max:32',
            // data obbligatorio e deve essere una data anteriore ad oggi 
            'dateOfBirth' => 'required|before:'.now(),
            'height' => 'integer|min:1'
        ]);        
        $newPerson = new Person();

        $newPerson -> firstName = $data['firstName'];
        $newPerson -> lastName = $data['lastName'];
        $newPerson -> dateOfBirth = $data['dateOfBirth'];
        $newPerson -> height = $data['height'];

        $newPerson -> save();

        return redirect() -> route('person.home');
    }
    
    public function goToEditForm(Person $person){
         
        $data = ["person" => $person];


        return view('pages.edit',$data);
    }
    public function editPerson(Request $request , Person $person){
        $data = $request -> validate([
            'firstName' => 'required|max:32',
            'lastName' => 'required|max:32',
            // data obbligatorio e deve essere una data anteriore ad oggi 
            'dateOfBirth' => 'required|before:'.now(),
            'height' => 'integer|min:1'
        ]);

        $person -> firstName = $data['firstName'];
        $person -> lastName = $data['lastName'];
        $person -> dateOfBirth = $data['dateOfBirth'];
        $person -> height = $data['height'];

        $person ->save();
        
        return redirect() -> route('person.home');
    }
}
