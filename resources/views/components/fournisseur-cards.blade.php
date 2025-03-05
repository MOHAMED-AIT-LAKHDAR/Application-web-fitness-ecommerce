@props(['four'])
<style>
  #edit{
    width: 350px;
    height:250px;
  }
</style>
<div class="col-lg-12 col-xl-4 col-md-12 col-12 col-sm-12" >
  <div class="card">
    <img alt="Image" style="object-fit: cover;" class="img-fluid b-img" id="edit" src="{{asset('images/fournisseur/'.$four->logo)}}">
    <div class="card-header custom-card-header border-bottom-0">
      <h5 class="main-content-label tx-dark tx-large mb-0"><strong>#{{$four->id}} {{$four->name}}</strong></h5>
    </div>
    <div class="card-body">
      <h6 class="">City : {{$four->city}}</h6>
      <p class="card-text">
        Email : {{$four->email}}
        <br>
        Tel : {{$four->phone_number}}</p>
      <a href="{{route('fournisseur.show',$four->id)}}" class="btn btn-dark ripple btn-block">Afficher Plus</a>
    </div>
  </div>
</div>


