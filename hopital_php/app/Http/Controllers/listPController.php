<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Motif;
use App\Models\Pays;
class listPController extends Controller
{
    //
    function list($nom)
    {   
        #echo $nom;
        $data = DB::table('patients')->where('Nom', $nom)->first();
        $sexe = DB::table('patients')->where('Nom', $nom)->value('Sexe');
        $motif = DB::table('patients')->where('Nom', $nom)->value('Code_Motif');
        $pays = DB::table('patients')->where('Nom', $nom)->value('Code_Pays');
        $motif_1=DB::table('motifs')->where('Code', $motif)->first();
        $pays_1=DB::table('pays')->where('Code', $pays)->first();
        $sexe_1=DB::table('sexe')->where('Code', $sexe)->first();
        return view('fiche_patient',['patients'=>$data, 'motifs'=>$motif_1, 'pays'=>$pays_1, 'sexe'=>$sexe_1]);
    }
}
