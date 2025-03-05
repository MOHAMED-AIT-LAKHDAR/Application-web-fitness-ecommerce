<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index(){
        $fours = Fournisseur::paginate(3);
        return view('admin.fournisseur.index',compact('fours'));
    }
    public function create(){
        return view('admin.fournisseur.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string|unique:fournisseurs',
            'email' => 'required|email|unique:fournisseurs',
            'city' => 'required',
            'address' => 'required',
            'logo' => 'required|image|mimes:png,jpg,svg,jpeg',
        ]);

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $file_extention = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/fournisseur';
            $file->move($path, $file_name);
        };

        Fournisseur::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'city' => $request->city,
            'address' => $request->address,
            'logo' => $file_name,
        ]);
        return redirect()->route('fournisseur.index')->with('success', 'You created Supplier successfully ');

    }

    public function show($id){
        $fournisseur = Fournisseur::findOrFail($id);
        return view('admin.fournisseur.show',compact('fournisseur'));
    }

    public function update($id){
        $fournis = Fournisseur::findOrFail($id);
        return view('admin.fournisseur.edit',compact('fournis','id'));
    }

    public function edit(Request $request){
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string|unique:fournisseurs',
            'email' => 'required|email|unique:fournisseurs',
            'city' => 'required',
            'address' => 'required',
            'logo' => 'image|mimes:png,jpg,svg,jpeg',
        ]);

        $currentImage = Fournisseur::findOrFail($request->id);
        $file_name = $currentImage->logo ;

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $file_extention = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/supplier';
            $file->move($path, $file_name);
        };

        $supplier = Fournisseur::findOrFail($request->id);
        $supplier->name = $request->name;
        $supplier->phone_number = $request->phone_number;
        $supplier->email = $request->email;
        $supplier->city = $request->city;
        $supplier->address = $request->address;
        $supplier->logo = $file_name;
        $supplier->update();
        return redirect()->route('fournisseur.index')->with('success', 'Votre mis à jour de fournisseur ' . $request->name . 'a été success ');
    }

    public function delete($id){
        $fourss = Fournisseur::findOrFail($id);
        $fourss->delete();
        return redirect()->route('fournisseur.index')->with('success', 'Votre supprission de fournisseur a été supprimer ');

    }

}
