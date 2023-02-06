<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        
        $peoples = Person::all();

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
}
