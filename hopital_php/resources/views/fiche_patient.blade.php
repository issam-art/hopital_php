@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
           <div class="card my-5">
            <table id="myTable"  class="table table-striped table-dark">
                 <div class="card header">
                         <div class="text-center font-weight-bold ">
                            <h2>Fiche du patient <div style="Color:rgb(137, 175, 225)" > {{$patients->Nom}} {{$patients->Prénom}}</div></h2>   
                         </div>
                 </div>
                 <div class="card-body">
                    <p><strong>Nom et prénom :</strong></br>{{$patients->Nom}} {{$patients->Prénom}}</br><strong>Sexe :</strong></br>{{$sexe->Libellé}}</br><strong>Date de Naissance :</strong></br>{{date('d/m/Y', strtotime($patients->Date_Naissance));}}</br><strong>
                        Numéro de sécurité sociale : </strong></br>{{$patients->Numéro_SécSoc}}</br><strong>Pays d'origine : </br></strong>{{$pays->Libellé}}</br><strong>Date de la 1ère entrée :</strong></br>{{date('d/m/Y', strtotime($patients->Date_1°_entrée));}}</br><strong>Motif :</strong></br>{{$motifs->Libellé}}
                    </p>
                 </div>
            </table>
            <div class="card-body">
                <button type="button" class="btn btn-success" onclick="window.location.href='{{route('web.search')}}'">Retour</button>
            </div> 

             </div>
            
         </div>    
     </div>
 </div>
  
    

@endsection

@section('js')
    <script>
        $(document).ready(function(){
           $('#myTable').DataTable({
               dom : 'Bfrtip', 
               buttons : [
                   'copy', 'excel', 'csv', 'pdf', 'print','colvis'
               ]
           });
        });
    </script>
@endsection