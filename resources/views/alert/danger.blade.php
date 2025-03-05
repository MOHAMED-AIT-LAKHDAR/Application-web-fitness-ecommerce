@php $message = Session::get('danger'); @endphp
<div class="alert alert-danger mt-lg-3 position-absolute w-75" style="
    top: 59px;" id="myAlert" role="alert">
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
    <i class="fe fe-thumbs-up"></i>
    <strong> {{ $message }}</strong>
</div>
