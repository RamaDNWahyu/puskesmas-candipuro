@php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			{{-- <small class="text-muted font-size-sm ml-2">12 messages</small> --}}
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('{{ auth()->user()->photo == null ? "https://ui-avatars.com/api/?name=" . auth()->user()->name : auth()->user()->photo }}')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					{{ auth()->user()->name }}
				</a>
                <div class="text-muted mt-1">
                    {{ auth()->user()->role }}
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								{{ Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>
                            <span class="navi-text text-muted text-hover-primary">{{ auth()->user()->email }}</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

		{{-- Nav --}}
		<div class="navi navi-spacer-x-0 p-0">
		    {{-- Item --}}
		    <a href="{{ url('profile') }}" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							{{ Metronic::getSVG("media/svg/icons/General/Notification2.svg", "svg-icon-md svg-icon-success") }}
						</div>
		            </div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    Profile Anda
		                </div>
		                <div class="text-muted">
		                    Account settings and more
		                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
		                </div>
		            </div>
		        </div>
		    </a>


		    {{-- Item --}}
		    <a href="#" class="navi-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							{{ Metronic::getSVG("media/svg/icons/Navigation/Sign-out.svg", "svg-icon-md svg-icon-primary") }}
						</div>
				   	</div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    Sign out
		                </div>
		                <div class="text-muted">
		                    Keluar dari sistem puskesmas
		                </div>
		            </div>
		        </div>
		    </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
		</div>

		{{-- Separator --}}
		<div class="separator separator-dashed my-7"></div>

		{{-- Notifications --}}
		<div>
			{{-- Heading --}}
        	<h5 class="mb-5">
            	Recent Logs
        	</h5>

            @foreach ($latestLogs as $l)
	        <div class="d-flex align-items-center @if($l->type == 'log') bg-light-warning @else bg-light-primary @endif rounded p-5 gutter-b">
	            <span class="svg-icon @if($l->type == 'log') svg-icon-warning @else svg-icon-primary @endif mr-5">
	                @if ($l->type == 'event')
                    {{ Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg") }}
                    @else
                    {{ Metronic::getSVG("media/svg/icons/Communication/Shield-thunder.svg", "svg-icon-lg") }}
                    @endif
	            </span>

	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">{{ $l->content }}</a>
	                <span class="text-muted font-size-sm">{{ \Carbon\Carbon::parse($l->created_at)->diffForHumans() }}</span>
	            </div>

	        </div>
            @endforeach
		</div>
    </div>
</div>
