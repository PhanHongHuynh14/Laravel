<div class="container">
    <div class="row headerbg">
        <div class="col-md-3">
            <h1 class="gol">LARAVEL</h1>
        </div>
        <div class="col-md-9">
            <h1 class="header">HEADER</h1>
        </div>

    </div>
    <div class="row" style="margin-top:8px">
        <div class="col-md-3 ">
            <div class="menu">
                  <a target="_top" href="{{ route('admin.skill.store') }}">Skill</a><br>
                  <a href="{{ route('admin.level.store') }}">Level</a><br>
                  <a href="{{ route('admin.skillMatrix.store')}}">SkillMatrix</a><br>
                  <a href="{{ route('admin.user.store')}}">User</a>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>

      <div class="col-md-12">
        <div class="footer">FOOTER</div>
      </div>
 </div>
