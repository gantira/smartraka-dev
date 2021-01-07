<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">{{ config('app.name') }} <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu ">
            <li class="{{ Request::segment(2) === 'index' ? 'active' : null }}"><a href="{{url('/')}}"><i class="icon-speedometer"></i><span>Dashbor</span></a></li>
            <li class="g_heading text-secondary">Master</li>
            <li class="{{ Request::segment(1) === 'users' ? 'active' : null }}"><a href="{{route('users.index')}}"><i class="icon-user"></i><span>Pengguna</span></a></li>
            <li class="{{ Request::segment(1) === 'accounts' ? 'active' : null }}"><a href="{{route('accounts.index')}}"><i class="icon-tag"></i><span>Akun</span></a></li>
            <li class="{{ Request::segment(1) === 'genders' ? 'active' : null }}"><a href="{{route('genders.index')}}"><i class="icon-users"></i><span>Jenis Kelamin</span></a></li>
            <li class="{{ Request::segment(1) === 'maritals' ? 'active' : null }}"><a href="{{route('maritals.index')}}"><i class="icon-globe-alt"></i><span>Status Pernikahan</span></a></li>
            <li class="{{ Request::segment(1) === 'jobtitles' ? 'active' : null }}"><a href="{{route('jobtitles.index')}}"><i class="icon-cup"></i><span>Jabatan</span></a></li>
            <li class="{{ Request::segment(1) === 'educations' ? 'active' : null }}"><a href="{{route('educations.index')}}"><i class="icon-graduation"></i><span>Pendidikan</span></a></li>
            <li class="{{ Request::segment(1) === 'religions' ? 'active' : null }}"><a href="{{route('religions.index')}}"><i class="icon-star"></i><span>Agama</span></a></li>
            <li class="{{ Request::segment(1) === 'units' ? 'active' : null }}"><a href="{{route('units.index')}}"><i class="icon-compass"></i><span>Satuan</span></a></li>
            <li class="{{ Request::segment(1) === 'companies' ? 'active' : null }}"><a href="{{route('companies.index')}}"><i class="icon-home"></i><span>Cabang</span></a></li>
            <li class="{{ Request::segment(1) === 'settings' ? 'active' : null }}"><a href="{{route('settings.index')}}"><i class="icon-settings"></i><span>Pengaturan</span></a></li>
            <li class="{{ Request::segment(1) === 'products' ? 'active' : null }}"><a href="{{route('products.index')}}"><i class="icon-note"></i><span>Produk</span></a></li>
            <li class="{{ Request::segment(1) === 'signatures' ? 'active' : null }}"><a href="{{route('signatures.index')}}"><i class="icon-pencil"></i><span>Penandatangan</span></a></li>
            <li class="{{ Request::segment(1) === 'categories' ? 'active' : null }}"><a href="{{route('categories.index')}}"><i class="icon-layers"></i><span>Kategori</span></a></li>
            <li class="g_heading text-secondary">Operasi</li>
            <li class="{{ Request::segment(1) === 'documents' ? 'active' : null }}"><a href="{{route('documents.index')}}"><i class="icon-folder-alt"></i><span>Dokumen</span></a></li>
            <li class="{{ Request::segment(1) === 'sofs' ? 'active' : null }}"><a href="{{route('sofs.index')}}"><i class="icon-diamond"></i><span>Pengajuan Dana</span></a></li>
            
            <li class="g_heading text-secondary">Laporan</li>
            <li class="{{ Route::currentRouteName() === 'reports.daily' ? 'active' : null }}"><a href="{{route('reports.daily')}}"><i class="icon-book-open"></i><span>Harian</span></a></li>
            <li class="{{ Route::currentRouteName() === 'reports.journal' ? 'active' : null }}"><a href="{{route('reports.journal')}}"><i class="icon-book-open"></i><span>Jurnal</span></a></li>
            <li class="{{ Route::currentRouteName() === 'reports.ledger' ? 'active' : null }}"><a href="{{route('reports.ledger')}}"><i class="icon-book-open"></i><span>Buku Besar</span></a></li>
            <li class="{{ Route::currentRouteName() === 'reports.revenue' ? 'active' : null }}"><a href="{{route('reports.revenue')}}"><i class="icon-book-open"></i><span>Laba Rugi</span></a></li>
            <li class="{{ Route::currentRouteName() === 'reports.neraca' ? 'active' : null }}"><a href="{{route('reports.neraca')}}"><i class="icon-book-open"></i><span>Neraca</span></a></li>
            <li class="{{ Route::currentRouteName() === 'reports.finance' ? 'active' : null }}"><a href="{{route('reports.finance')}}"><i class="icon-book-open"></i><span>Keuangan</span></a></li>
            
            {{-- <li class="g_heading text-secondary">Options</li>
            <li class="{{ Request::segment(1) === 'project' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Project</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'index2' ? 'active' : null }}"><a href="{{route('project.index2')}}">Dashboard</a></li>
                    <li class="{{ Request::segment(2) === 'list' ? 'active' : null }}"><a href="{{route('project.list')}}">Project list</a></li>
                    <li class="{{ Request::segment(2) === 'taskboard' ? 'active' : null }}"><a href="{{route('project.taskboard')}}">Taskboard</a></li>
                    <li class="{{ Request::segment(2) === 'ticket' ? 'active' : null }}"><a href="{{route('project.ticket')}}">Ticket List</a></li>
                    <li class="{{ Request::segment(2) === 'ticketdetails' ? 'active' : null }}"><a href="{{route('project.ticketdetails')}}">Ticket Details</a></li>
                    <li class="{{ Request::segment(2) === 'clients' ? 'active' : null }}"><a href="{{route('project.clients')}}">Clients</a></li>
                    <li class="{{ Request::segment(2) === 'todo' ? 'active' : null }}"><a href="{{route('project.todo')}}">Todo List</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) === 'job' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-briefcase"></i><span>Job Portal</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'index3' ? 'active' : null }}"><a href="{{route('job.index3')}}">Dashboard</a></li>
                    <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('job.positions')}}">Positions</a></li>
                    <li class="{{ Request::segment(2) === 'applicants' ? 'active' : null }}"><a href="{{route('job.applicants')}}">Applicants</a></li>
                    <li class="{{ Request::segment(2) === 'resumes' ? 'active' : null }}"><a href="{{route('job.resumes')}}">Resumes</a></li>
                    <li class="{{ Request::segment(2) === 'jobsettings' ? 'active' : null }}"><a href="{{route('job.jobsettings')}}">Settings</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) === 'authentication' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-lock"></i><span>Authentication</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'login' ? 'active' : null }}"><a href="{{route('authentication.login')}}">Login</a></li>
                    <li class="{{ Request::segment(2) === 'register' ? 'active' : null }}"><a href="{{route('authentication.register')}}">Register</a></li>
                    <li class="{{ Request::segment(2) === 'forgotpassword' ? 'active' : null }}"><a href="{{route('authentication.forgotpassword')}}">Forgot password</a></li>
                    <li class="{{ Request::segment(2) === 'error404' ? 'active' : null }}"><a href="{{route('authentication.error404')}}">Error 404</a></li>
                    <li class="{{ Request::segment(2) === 'error500' ? 'active' : null }}"><a href="{{route('authentication.error500')}}">Error 500</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>        
</div>