<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Motif;
use App\Models\Pays;

class SearchController extends Controller
{   
    //
    function search(Request $request){
        $motifs=DB::select('select * from motifs ORDER BY Libellé ASC');
        $pays=DB::select('select * from pays ORDER BY Libellé ASC');
        $x=2022;
        $y=2022;
        
        #if(isset($_GET['submit'])){
            if(isset($_GET['nom'])){
                if(isset($_GET['motif1']) && isset($_GET['pay1'])){
                    $search_motif = $_GET['motif1'];
                    $search_pays = $_GET['pay1'];
                    $search_text = $_GET['nom'];
                    $date_f=$_GET['anneef'];
                    $date_d=$_GET['anneed'];
                    $patients = DB::table('patients')->where('Nom','LIKE',$search_text.'%')->paginate(10);
                    if($_GET['motif1']!="Indifférent" && $_GET['pay1']!="Indifférent"){
                        $Code_motif = DB::table('motifs')->where('Libellé','LIKE',$search_motif)->value('Code');
                        $Code_pays = DB::table('pays')->where('Libellé','LIKE',$search_pays)->value('Code');
                        
                        if($date_d!="Indifférent" && $date_f!="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '>=', $date_d.'01-01')->whereDate('Date_Naissance', '<=', $date_f.'01-01')->paginate(10);
                        }
                        else if($date_d=="Indifférent" && $date_f!="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '<=', $date_f.'01-01')->paginate(10);
                        }
                        else if($date_d!="Indifférent" && $date_f=="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '>=', $date_d.'01-01')->paginate(10);
                        }

                        else{
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->paginate(10);
                        }
                        return view('recherche_patient',['motifs'=>$motifs, 'pays'=>$pays,'Code_motif'=>$Code_motif,'Code_pays'=>$Code_pays, 'patients'=>$patients, 'x'=>$x, 'y'=>$y]);
                        #->nest('list',['motifs'=>$motifs, 'pays'=>$pays,'Code_motif'=>$Code_motif,'Code_pays'=>$Code_pays, 'patients'=>$patients])
                    }
                    else if($_GET['motif1']!="Indifférent" && $_GET['pay1']=="Indifférent"){
                        $Code_motif = DB::table('motifs')->select('Code')->where('Libellé','LIKE',$search_motif)->paginate(10);
                        
                        
                        if($date_d!="Indifférent" && $date_f!="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '>=', $date_d.'01-01')->whereDate('Date_Naissance', '<=', $date_f.'01-01')->paginate(10);
                        }
                        else if($date_d=="Indifférent" && $date_f!="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '<=', $date_f.'01-01')->paginate(10);
                        }
                        else if($date_d!="Indifférent" && $date_f=="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '>=', $date_d.'01-01')->paginate(10);
                        }

                        else{
                            $patients=DB::table('patients')->where([['Code_Motif','LIKE',$Code_motif],['Nom','LIKE',$search_text.'%']])->paginate(10);
                        }
                        return view('recherche_patient',['motifs'=>$motifs, 'pays'=>$pays,'Code_motif'=>$Code_motif, 'patients'=>$patients, 'x'=>$x , 'y'=>$y]);
                }
                    else if($_GET['motif1']=="Indifférent" and $_GET['pay1']!="Indifférent"){
                        $Code_pays = DB::table('pays')->select('Code')->where('Libellé','LIKE',$search_pays)->paginate(10);
                        
                        
                        
                        if($date_d!="Indifférent" && $date_f!="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '>=', $date_d.'01-01')->whereDate('Date_Naissance', '<=', $date_f.'01-01')->paginate(10);
                        }
                        else if($date_d=="Indifférent" && $date_f!="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '<=', $date_f.'01-01')->paginate(10);
                        }
                        else if($date_d!="Indifférent" && $date_f=="Indifférent"){
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Nom','LIKE',$search_text.'%']])->whereDate('Date_Naissance', '>=', $date_d.'01-01')->paginate(10);
                        }

                        else{
                            $patients=DB::table('patients')->where([['Code_Pays','LIKE',$Code_pays],['Nom','LIKE',$search_text.'%']])->paginate(10);
                        }
                        return view('recherche_patient',['motifs'=>$motifs, 'pays'=>$pays,'Code_pays'=>$Code_pays, 'patients'=>$patients, 'x'=>$x , 'y'=>$y]);
                    }
                    else{
                        
                    return view('recherche_patient',['patients'=>$patients, 'motifs'=>$motifs, 'pays'=>$pays, 'x'=>$x , 'y'=>$y]);}}
                else{
                    return view('recherche_patient',['patients'=>$patients, 'motifs'=>$motifs, 'pays'=>$pays, 'x'=>$x , 'y'=>$y]);
                }
            }
            else{
                
                return view('recherche_patient',['motifs'=>$motifs, 'pays'=>$pays, 'x'=>$x , 'y'=>$y]);
        }
    }
    #}

}

?>
