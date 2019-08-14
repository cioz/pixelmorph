@extends('layouts.master')


@section('content')
@component('components.navblog', ['responsive' => $responsive])
@endcomponent
<div class="containerContent">
	blog {{ $test }}


</div>
<script>
 $(document).ready(function(){
    $('.datepicker').datepicker(
        {
        monthsFull: ['Januar', 'Februar', 'März', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    }
    );
  });
 /*

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var options = {
        monthsFull: ['Januar', 'Februar', 'März', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    }
    var instances = M.Datepicker.init(elems, options);
  });
  */
</script>
@endsection
