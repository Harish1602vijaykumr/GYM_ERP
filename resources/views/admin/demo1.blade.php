@extends('admin.adminlayout')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<input type="text"   id="base_url" value="{{url('')}}">
        			<input type="text" id="input">
        			<button id="btn">search</button>
        			<a href="" id="href">link</a>
        			@if(isset($data)){
            			@foreach($data as $data)
                			<p>{{$data->name}}</p>
            			@endforeach
        			}
        			@endif
    			</div>
</main>
<script type="text/javascript">
$(document).ready(function(){
    $('#input').change(function(){
       var base_url=$("#base_url").val();
       var url="/get_concept";
       var name = $("#input").val();
       $("#href").attr('href',base_url+url+'/'+name);
    });
});
</script>
@endsection