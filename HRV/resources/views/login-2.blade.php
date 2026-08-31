@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

	<div class="container-fuild">
		<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
			<div class="row">
				<div class="col-lg-5">
					<div class="d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100 bg-primary-transparent">
						<div>
							<img src="{{URL::asset('build/img/bg/authentication-bg-03.svg')}}" alt="Img">
						</div>
					</div>
				</div>
				<div class="col-lg-7 col-md-12 col-sm-12">
					<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
						<div class="col-md-7 mx-auto vh-100">
							<form action="{{url('index')}}" class="vh-100">
								<div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
									<div class=" mx-auto mb-5 text-center">
										<img src="{{URL::asset('build/img/logo.svg')}}"
											class="img-fluid" alt="Logo">
									</div>
									<div class="">
										<div class="text-center mb-3">
											<h2 class="mb-2">Giriş Yapın</h2>
											<p class="mb-0">Lütfen giriş bilgilerinizi giriniz</p>
										</div>
										<div class="mb-3">
											<label class="form-label">TC. Kimlik Numarası</label>
											<div class="pass-group">
												<input type="password" class="pass-input form-control">
												<span class="ti toggle-password ti-eye-off"></span>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Şifre</label>
											<div class="pass-group">
												<input type="password" class="pass-input form-control">
												<span class="ti toggle-password ti-eye-off"></span>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-3">
											<div class="d-flex align-items-center">

											</div>
											<div class="text-end">
												<a href="{{url('forgot-password-2')}}" class="hover-a">Şifremi
													Unuttum?</a>
											</div>
										</div>
										<div class="mb-3">
											<button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
										</div>
										<div class="text-center">
											<h6 class="fw-normal text-dark mb-0">Kullanıcınız yok mu?
												<a href="{{url('register-2')}}" class="hover-a"> Kullanıcı Oluştur</a>
											</h6>
										</div>
									</div>
									<div class="mt-5 pb-4 text-center">
										<p class="mb-0 text-gray-9">Copyright &copy; 2026 - Hr Vision</p>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
