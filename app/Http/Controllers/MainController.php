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
        ],
        [
           'firstName.required' => "Innominato, inserisci il tuo nome!",
            'firstName.max' => "Se hai un nome con più di 32 caratteri, o cambi il nome o cambi il sito. Io ti consiglio la prima!",
            'lastName.required' => "Innominato, inserisci il tuo cognome!",
            'lastName.max' => "Se hai un cognome con più di 32 caratteri, o cambi il nome o cambi il sito. Io ti consiglio la prima!",
            'dateOfBirth.required' => "La data di nascita è obbligatoria ammesso che tu ne abbia una.",
            'dateOfBirth.before' => 'Vieni dal futuro?',
            'height.integer' => 'La tua altezza dovrebbe essere un numero',
            'height.min' => 'Scusa non ti vedo........................................']);        
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
        ],
        // il secondo array è per definire i messaggi di errore personalizzati
        [
            'firstName.required' => "Innominato, inserisci il tuo nome!",
            'firstName.max' => "Se hai un nome con più di 32 caratteri, o cambi il nome o cambi il sito. Io ti consiglio la prima!",
            'lastName.required' => "Innominato, inserisci il tuo cognome!",
            'lastName.max' => "Se hai un cognome con più di 32 caratteri, o cambi il nome o cambi il sito. Io ti consiglio la prima!",
            'dateOfBirth.required' => "La data di nascita è obbligatoria ammesso che tu ne abbia una.",
            'dateOfBirth.before' => 'Vieni dal futuro?',
            'height.integer' => 'La tua altezza dovrebbe essere un numero',
            'height.min' => 'Scusa non ti vedo........................................'
        ]);

        $person -> firstName = $data['firstName'];
        $person -> lastName = $data['lastName'];
        $person -> dateOfBirth = $data['dateOfBirth'];
        $person -> height = $data['height'];

        $person ->save();
        
        return redirect() -> route('person.home');
    }
}

