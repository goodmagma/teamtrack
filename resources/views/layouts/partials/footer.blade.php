	<!-- Footer -->
	<footer class="footer footer-transparent d-print-none">
		<div class="container-xl">
			<div class="row text-center align-items-center flex-row-reverse">
				<div class="col-lg-auto ms-lg-auto">
					<ul class="list-inline list-inline-dots mb-0">
						<li class="list-inline-item"><a href="{{route('pages.page', 'privacy')}}" class="link-secondary">{{__("Privacy Policy")}}</a></li>
						<li class="list-inline-item"><a href="{{route('pages.page', 'cookie')}}" class="link-secondary">{{__("Cookie Policy")}}</a></li>
						<li class="list-inline-item"><a href="{{route('pages.page', 'terms')}}" class="link-secondary">{{__("Terms of Service")}}</a></li>
					</ul>
				</div>
				<div class="col-12 col-lg-auto mt-3 mt-lg-0">
					<ul class="list-inline list-inline-dots mb-0">
						<li class="list-inline-item">
							Copyright &copy; 2021-{{date("Y")}} {{config('app.name')}}. All rights reserved.
						</li>
          				<li class="list-inline-item">
							v{{ config('platform.version', '') }} / {{ config('platform.release_date', '') }}
          				</li>
        			</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- /Footer -->