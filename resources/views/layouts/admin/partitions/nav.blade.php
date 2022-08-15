
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
    <div class="container-xl">
        <a class="navbar-brand" href="#">Container XL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{__('messages.home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('messages.link')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{__('messages.disabled')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">{{__('messages.dropdown')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                        <li><a class="dropdown-item" href="#">{{__('messages.action')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('messages.another')}}</a></li>
                        <li><a class="dropdown-item" href="#">{{__('messages.some')}}</a></li>
                    </ul>
                </li>
            </ul>
            <form>
                <input class="form-control" type="text" placeholder="{{__('messages.search')}}" aria-label="Search">
            </form>
            <a href="{{ route('locale.setting', 'en') }}">
  EN
</a>
<a href="{{ route('locale.setting', 'vi') }}">
  VN
</a>
        </div>
    </div>
</nav>





