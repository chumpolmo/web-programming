@include('templates.header')
@include('templates.menu')

<h1>{{ $topic }}</h1>
<div class="container">
<p>
<div class="card" style="width: 100%;">
  <img src="{{ asset($fc->logo) }}" class="card-img-top" alt="{{ $fc->name }}">
  <div class="card-body">
    <h5 class="card-title">{{ $fc->name }} (No. {{ $fc->id }})</h5>
    <p class="card-text">{{ $fc->description }}</p>
    <a href="/footballclub" class="btn btn-primary">ย้อนกลับ</a>
  </div>
</div>
</p>
</div>

</body>
</html>