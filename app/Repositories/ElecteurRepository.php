<?php
namespace App\Repositories;

use App\Models\Electeur;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class ElecteurRepository extends RessourceRepository{
    public function __construct(Electeur $electeur){
        $this->model = $electeur;
    }

}
