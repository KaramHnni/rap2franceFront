@extends('layouts.site')

@section('main-section')

	<script>
  (function() {
    var cx = 'partner-pub-2176698891774775:9098524048';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search> 
@endsection