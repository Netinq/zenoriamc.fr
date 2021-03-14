@if ( Session::has('error'))
<div class="popup error alert alert-dismissible fade show">
    <h4>{{ Session::get('error')[0] }}</h4>
    <span>{{ Session::get('error')[1] }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
</div>
@endif
@if ( Session::has('success'))
<div class="popup success alert alert-dismissible fade show">
    <h4>{{ Session::get('success')[0] }}</h4>
    <span>{{ Session::get('success')[1] }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
</div>
@endif
