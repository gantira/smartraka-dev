<div id="header_top" class="header_top">
    <div class="container">
        <div class="hleft">
            <a class="header-brand" href="{{ url('/') }}"><i class="fe fe-command brand-logo"></i></a>
            <div class="dropdown">
                {{-- <a href="{{route('pages.search')}}" class="nav-link icon"><i class="fa fa-search"></i></a>
                <a href="{{route('pages.calendar')}}" class="nav-link icon app_inbox"><i class="fa fa-calendar"></i></a>
                <a href="{{route('pages.contact')}}"  class="nav-link icon xs-hide"><i class="fa fa-id-card-o"></i></a>
                <a href="{{route('chatapp.chat')}}"  class="nav-link icon xs-hide"><i class="fa fa-comments-o"></i></a>
                <a href="{{route('pages.filemanager')}}"  class="nav-link icon app_file xs-hide"><i class="fa fa-folder-o"></i></a> --}}
            </div>
        </div>
        <div class="hright">
            <div class="dropdown">
                {{-- <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fa fa-gear fa-spin" data-toggle="tooltip" data-placement="right" title="Settings"></i></a> --}}
                <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="{{ asset(auth()->user()->foto_preview) }}" alt="" data-toggle="tooltip" data-placement="right" title="User Menu"/></a>
                <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
                
            </div>
        </div>
    </div>
</div>