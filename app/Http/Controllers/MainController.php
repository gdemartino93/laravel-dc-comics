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
        $data = $request -> all();

        $newPerson = new Person();

        $newPerson -> firstName = $data['firstName'];
        $newPerson -> lastName = $data['lastName'];
        $newPerson -> dateOfBirth = $data['dateOfBirth'];
        $newPerson -> height = $data['height'];

        $newPerson -> save();

        return redirect() -> route('person.home');
    }
}
