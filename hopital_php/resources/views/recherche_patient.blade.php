@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-10 mx-auto">
                   <div class="card my-5">
                         <div class="card header">
                                 <div class="text-center font-weight-bold text-uppercase">
                                     <h4>Patient</h4>   
                                 </div>
                         </div>
                         <div class="card-body">
                             <form action="{{ route('web.search')}}" class="mt-3" method="GET">
                                     <div class="form-group mb-3">
                                             <label for="Nom">Nom</label>
                                             <input type="text" class="form-control" name="nom" placeholder="Saisir ici....." value="<?php if(isset($_GET['nom'])){echo $_GET['nom'];}?>">  
                                     </div> 
                                     <label for="Nom">Choisir Motif: </label>
                                     <div  class="input-group mb-3">
                                          
                                          <select name="motif1" id="motif1" class="custom-select" >
                                              <option value="" selected>Indifférent</option>
                                                @foreach($motifs as $motif)
                                                <option value="{{$motif->Libellé}}">{{$motif->Libellé}}</option>
                                                @endforeach
                                            </select>
                                      </div> 
                                           
                                      <label for="Nom">Choisir Pays: </label>
                                      <div class="input-group mb-3">
                                        
                                            <select name="pay1" id="pay1" class="custom-select">
                                                <option value="" selected>Indifférent</option>
                                            @foreach($pays as $pay)
                                                <option value="{{$pay->Libellé}}">{{$pay->Libellé}}</option>
                                            @endforeach
                                            </select>
                                      </div> 

                                      <div class="form-group mb-3">
                                        <label for="">Date de naissance :</label></br>
                                            <label for="anneed">Année de début :</label>
                                            <select name="anneed" id="anneed" class="custom-select">
                                                <option value="Indifférent" selected>Indifférent</option>
                                                @while($x >= 1900)
                                                <option value="{{$x}}">{{$x}}</option>
                                                <?php
                                                $x = $x-1;
                                                ?>
                                                @endwhile
                                            </select>

                                            <label for="anneef">&nbsp; &nbsp; &nbsp;Année de fin :</label>
                                            <select name="anneef" id="anneef" class="custom-select">
                                                <option value="Indifférent" selected>Indifférent</option>
                                                @while($y >= 1900)
                                                <option value="{{$y}}">{{$y}}</option>
                                                <?php
                                                $y = $y-1;
                                                ?>
                                                @endwhile
                                            </select>
                                      </div>   
                                    <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary">Rechercher</button>
                                    </div> 
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" onclick="window.location.href='{{route('welcome')}}'">Retour</button>
                                    </div> 
                             </form>
                             <div class="card-body">
                                @if(isset($patients))
                                @if(count($patients)>0)
                                 <table id="myTable"  class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                            @foreach($patients as $patient)
                                            <tr>
                                                <td ><a href="fiche_patient/{{$patient->Nom}}">{{$patient->Nom}}</a></td>
                                                <td ><a href="fiche_patient/{{$patient->Nom}}">{{$patient->Prénom}}</a></td>
                                            </tr>
                                            @endforeach
                                            @else
                        
                                             <h4>No result found!</h4>
                                            @endif
                                          
                                   </tbody>
                               
                                 </table>
                                 @endif
                              </div>
                         </div>
                     </div>
                    
                 </div>    
             </div>
            
        </div>
    </div>
    

@endsection
