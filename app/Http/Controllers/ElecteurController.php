<?php

namespace App\Http\Controllers;

use App\Repositories\CentrevoteRepository;
use App\Repositories\ElecteurRepository;
use Illuminate\Http\Request;

class ElecteurController extends Controller
{
    protected $electeurRepository;
    protected $centrevoteRepository;


    public function __construct(ElecteurRepository $electeurRepository,CentrevoteRepository $centrevoteRepository){
        $this->electeurRepository =$electeurRepository;
        $this->centrevoteRepository =$centrevoteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $electeurs = $this->electeurRepository->getAll();
        return view('electeur.index',compact('electeurs'));
    }

    public function allElecteurApi(){
        $electeurs = $this->electeurRepository->getAll();
        return response()->json($electeurs);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centrevotes = $this->centrevoteRepository->getAll();
        return view('electeur.add',compact('centrevotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $electeurs = $this->electeurRepository->store($request->all());
        return redirect('electeur');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $electeur = $this->electeurRepository->getById($id);
        return view('electeur.show',compact('electeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centrevotes = $this->centrevoteRepository->getAll();
        $electeur = $this->electeurRepository->getById($id);
        return view('electeur.edit',compact('electeur','centrevotes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->electeurRepository->update($id, $request->all());
        return redirect('electeur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->electeurRepository->destroy($id);
        return redirect('electeur');
    }
}
