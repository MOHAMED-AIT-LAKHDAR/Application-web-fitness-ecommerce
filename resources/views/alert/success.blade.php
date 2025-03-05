@php $message = Session::get('success'); @endphp
<div class="alert alert-success position-absolute w-75" id="myAlert" style="
    top: 70px;" role="alert">
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
    <i class="fe fe-thumbs-up"></i>
    <strong>Well done!</strong> {{ $message }}
</div>
