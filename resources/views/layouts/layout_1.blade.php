<!DOCTYPE html>
<html>
<head>
    <title>DocApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #808000;">
    <div class="container-fluid">
      <a class="navbar-brand" style="color: aliceblue" href="#">DoctorAppointment</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav navbar-right">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="{{ route('appointments.list') }}" style="color: aliceblue">Home</a>
            <a class="nav-link" href="{{ route('doctors.index') }}" style="color: aliceblue">Doctors</a>
            <a class="nav-link" href="{{ route('appointments.index') }}" style="color: aliceblue">Appointments</a>
           </div>
        </div>
    </ul>
    </div>
  </nav>
{{-- navbar --}}

<div class="container">
      @if (Session::has('message'))

            <div class="alert alert-success text-center">
                <div class="row">
                <div class="col-md-6"><p>{{ Session::get('message') }}</p></div>
                <div class="col-md-3"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>
            </div>


            </div>

  @endif

    @yield('content')
</div>


{{-- JS --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script>
    		jQuery(document).ready(function(){
			jQuery('#department').change(function(){
				let did=jQuery(this).val();
				jQuery('#doctor').html('<option value="">Select Dcotor</option>')
				jQuery.ajax({
					url:'/getDoctor',
					type:'post',
					data:'did='+did+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#doctor').html(result)
					}
				});
			});

			jQuery('#fee').change(function(){
				let fid=jQuery(this).val();
				jQuery.ajax({
					url:'/getFee',
					type:'post',
					data:'fid='+fid+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#fee').html(result)
					}
				});
			});

		});

</script>

{{-- js --}}
</body>
</html>
