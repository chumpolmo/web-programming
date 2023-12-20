@include('templates.header')
@include('templates.menu')

<div class="container">
<h1>{{ $topic }}</h1>
<p>
<div class="card" style="width: 40%;">
  <div class="card-body">
    <h5 class="card-title">{{ $fcprof->inputName }}</h5>
    <p class="card-text">{{ $fcprof->inputDesc }}</p>
    <p class="card-text">{{ $fcprof->inputStatus }}</p>
    <a href="/footballclub" class="btn btn-primary">ย้อนกลับ</a>
  </div>
</div>
</p>
</div>

@include('templates.footer')