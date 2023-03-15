<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('dashboard') }}"
                                class="{{ str_contains(url()->current(), 'dashboard') ? 'menu-top-active' : '' }}">DASHBOARD</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle {{ $active == 'table' ? 'menu-top-active' : '' }}"
                                id="ddlmenuItem" data-toggle="dropdown">TABLE <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('user.index') }}"
                                        class="{{ str_contains(url()->current(), 'user') ? 'menu-top-active' : '' }}">Table
                                        User</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('outlet.index') }}"
                                        class="{{ str_contains(url()->current(), 'outlet') ? 'menu-top-active' : '' }}">Table
                                        Outlet</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('paket.index') }}"
                                        class="{{ str_contains(url()->current(), 'paket') ? 'menu-top-active' : '' }}">Table
                                        Paket</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('member.index') }}"
                                        class="{{ str_contains(url()->current(), 'member') ? 'menu-top-active' : '' }}">Table
                                        Member</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('transaksi.index') }}"
                                        class="{{ str_contains(url()->current(), 'transaksi') ? 'menu-top-active' : '' }}">Table
                                        Transaksi</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle {{ $active == 'form' ? 'menu-top-active' : '' }}"
                                id="ddlmenuItem" data-toggle="dropdown">FORM <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('user.create') }}"
                                        class="{{ str_contains(url()->current(), 'user/') ? 'menu-top-active' : '' }}">Form
                                        User</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('outlet.create') }}"
                                        class="{{ str_contains(url()->current(), 'outlet/') ? 'menu-top-active' : '' }}">Form
                                        Outlet</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('paket.create') }}"
                                        class="{{ str_contains(url()->current(), 'paket/') ? 'menu-top-active' : '' }}">Form
                                        Paket</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('member.create') }}"
                                        class="{{ str_contains(url()->current(), 'member/') ? 'menu-top-active' : '' }}">Form
                                        Member</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="{{ route('transaksi.create') }}"
                                        class="{{ str_contains(url()->current(), 'transaksi/') ? 'menu-top-active' : '' }}">Form
                                        Transaksi</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('laporan') }}"
                                class="class={{ str_contains(url()->current(), 'laporan') ? 'menu-top-active' : '' }}">LAPORAN</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
