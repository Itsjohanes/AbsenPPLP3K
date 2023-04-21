<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">

					<ul class="nav">
						<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
							<a href="/">
								<i class="fas fa-home text-info"></i>
								<p>Dashboard</p>
							</a>
						</li>
						@if((auth()->user()->level == 'admin') )
                        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
							<a href="/admin">
								<i class="fas fa-user-shield text-secondary"></i>
								<p>Admin</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\Admin::count() }}</span>
							</a>
						</li>
{{--                        <li class="nav-item {{ Request::is('kepala-sekolah') ? 'active' : '' }}">--}}
{{--							<a href="/kepala-sekolah">--}}
{{--								<i class="fas fa-brain text-success"></i>--}}
{{--								<p>Kepala Sekolah</p>--}}
{{--								<span class="badge badge-count badge-danger">{{ \App\Models\KepalaSekolah::count() }}</span>--}}
{{--							</a>--}}
{{--						</li>--}}
                        <li class="nav-item {{ Request::is('guru-p3k') ? 'active' : '' }}">
							<a href="/guru-p3k">
								<i class="fas fa-chalkboard-teacher text-danger"></i>
								<p>Guru P3K</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\GuruP3K::count() }}</span>
							</a>
						</li>
                        <li class="nav-item {{ Request::is('guru-ppl') ? 'active' : '' }}">
							<a href="/guru-ppl">
								<i class="fas fa-chalkboard-teacher text-warning"></i>
								<p>Guru PPLSP</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\GuruPPL::count() }}</span>
							</a>
						</li>

						{{-- <li class="nav-item {{ (Request::is('laporan-absensi-p3k')) || (Request::is('laporan-absensi-ppl')) ? 'show' : ''}} submenu">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Laporan Absensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="base">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('laporan-absensi-p3k') ? 'active' : '' }}">
										<a href="../components/avatars.html">
											<span class="sub-item">Guru PNS</span>
										</a>
									</li>
									<li>
										<a href="{{ Request::is('laporan-absensi-ppl') ? 'active' : '' }}">
											<span class="sub-item">Guru ppl</span>
										</a>
									</li>
								</ul>
							</div>
						</li> --}}


						<li class="nav-item {{ (Request::is('laporan-absensi-p3k')) || (Request::is('laporan-absensi-ppl')) ? 'active submenu' : ''}}">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table text-primary"></i>
								<p>Laporan Absensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse {{ (Request::is('laporan-absensi-p3k')) || (Request::is('laporan-absensi-ppl')) ? 'show' : ''}}" id="tables">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('laporan-absensi-p3k') ? 'active' : '' }}">
										<a href="/laporan-absensi-p3k">
											<span class="sub-item">Guru P3K</span>
										</a>
									</li>
									<li class="{{ Request::is('laporan-absensi-ppl') ? 'active' : '' }}">
										<a href="/laporan-absensi-ppl">
											<span class="sub-item">Guru PPLSP</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{ Request::is('lokasi-sekolah') ? 'active' : '' }}">
							<a href="/lokasi-sekolah">
								<i class="fas fa-map-marker-alt text-success"></i>
								<p>Lokasi Sekolah</p>
							</a>
						</li>

						@endif
						@if (auth()->user()->level == 'guru_p3k')
						<li class="nav-item {{ Request::is('absen-guru-p3k') ? 'active' : '' }}">
							<a href="/absen-guru-p3k">
								<i class="fas fa-clipboard-list text-warning"></i>
								<p>Absen Guru P3K</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('lokasi-anda') ? 'active' : '' }}">
							<a href="/lokasi-anda">
								<i class="fas fa-map-marker-alt text-success"></i>
								<p>Lokasi Anda</p>
							</a>
						</li>
						@endif

						@if (auth()->user()->level == 'guru_ppl')
						<li class="nav-item {{ Request::is('absen-guru-ppl') ? 'active' : '' }}">
							<a href="/absen-guru-ppl">
								<i class="fas fa-clipboard-list text-warning"></i>
								<p>Absen Guru PPLSP</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('lokasi-anda') ? 'active' : '' }}">
							<a href="/lokasi-anda">
								<i class="fas fa-map-marker-alt text-success"></i>
								<p>Lokasi Anda</p>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
