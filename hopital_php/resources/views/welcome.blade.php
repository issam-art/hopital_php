@extends('adminlte::page')

@section('content')

    <div class="container">
       <div class="row">
           <div class="col-md-10 mx-auto">
              <div class="card my-5">
                 <div class="card header">
                   
                 </div>
                 <div class="card-body">
               
                    <div class="wrapper2">
                        <div class="typing-demo">
                          Hopital Villeurbanne 🏥
                        </div>
                    </div>
                    <p class="text-center" style="text-bold"><b>Effectuer une recheche patient:</b></p>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('web.search')}}'">Rechercher</button>
                      </div>
                 </div>
              </div>
              
           </div>
       </div>
    </div>
@endsection

<style>
.wrapper2 {
    height: 20vh;
    /*This part is important for centering*/
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .typing-demo {
    width: 25ch;
    animation: typing 2s steps(22), blink .5s step-end infinite alternate;
    white-space: nowrap;
    overflow: hidden;
    border-right: 3px solid;
    font-family: monospace;
    font-size: 2em;
  }
  
  @keyframes typing {
    from {
      width: 0
    }
  }
      
  @keyframes blink {
    50% {
      border-color: transparent
    }
  }
</style>