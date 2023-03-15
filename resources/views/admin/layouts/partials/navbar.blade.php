<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">

                <img src="{{ asset('/adminpage/assets/img/logo.png') }}" />
            </a>

        </div>

        <div class="right-div">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <h4>{{ auth()->user()->nama }} ({{ auth()->user()->role }})</h4>
                <button type="submit" class="btn btn-danger"><i class="fa fa-sign-out"></i> LOGOUT</button>
            </form>
        </div>
    </div>
</div>
