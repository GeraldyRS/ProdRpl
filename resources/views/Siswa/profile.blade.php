@extends('layout.master')

@section('content')

<!-- MAIN CONTENT -->
<br><br><br><br><br><br>
<div class="main-content" style="width:400px;margin:auto;">
	<div class="container-fluid">
		<div class="panel panel-profile">
			<div class="clearfix">
				<!-- LEFT COLUMN -->
				<div class="profile-center">
					<!-- PROFILE HEADER -->
					<div class="profile-header">
						<div class="overlay"></div>
						<div class="profile-main">
							<h3 class="name">{{$profile->name}}</h3>
							<span class="online-status status-available">Available</span>
						</div>
					</div>
					<!-- END PROFILE HEADER -->
					<!-- PROFILE DETAIL -->
					<div class="profile-detail">
						<div class="profile-info">
							<h3 class="heading">{{$profile->role}} <img src="/medal.png" width="20" height="30"></h3>
							<ul class="list-unstyled list-justify">
								<li>Nama &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:{{$profile->name}}</li>
								<li>Alamat Email &ensp;:{{$profile->email}}</li>
								<li>NIS &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:{{$profile->nis}}</li>
							</ul>
							<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  id="simpan">Ubah kata sandi ?</button>
						</div>
					</div>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<form method="POST" action="/ganti/password" onsubmit="return cekStok()">
										{{csrf_field()}}
										<input type="hidden" name="id_user" value="{{Auth::user()->id}}" class="form-control">

										<label for="password_lama"> Password </label>
										<input type="password" id="password_lama" name="password_lama" class="form-control" required>

										<label for="password"> New Password </label>
										<input type="password" id="password" name="password" class="form-control" required>


										<label for="password_confirm"> Confirm Password </label>
										<input type="password" id="password_confirm" name="password_confirmation" class="form-control" required>

									</div>
									<div class="modal-footer">
										<button class=" mt-2 btn btn-primary xs">Submit</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
@stop
