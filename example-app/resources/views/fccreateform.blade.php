@include('templates.header')
@include('templates.menu')

<div class="container">
<h1>{{ $topic }}</h1>
<div>
<form action="/fcCreate" method="POST">
  @csrf
  <div class="mb-3">
    <label for="inputName" class="form-label">ชื่อสโมสร</label>
    <input type="text" class="form-control" id="inputName" name="inputName" value="{{ old('inputName') }}">
    @error('inputName')
      <span class="text-danger form-text">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="inputDesc" class="form-label">รายละเอียด</label>
    <textarea id="inputDesc" name="inputDesc" class="form-control">{{ old('inputDesc') }}</textarea>
  </div>
  <label class="form-label">สถานะของสโมสร</label>
  <div class="mb-3">
    <input type="radio" class="form-check-input" id="inputCheck1" value="10" name="inputStatus">
    <label class="form-check-label" for="inputCheck1">เปิด</label>
  </div>
  <div class="mb-3">
    <input type="radio" class="form-check-input" id="inputCheck2" value="20" name="inputStatus">
    <label class="form-check-label" for="inputCheck2">ปิด</label>
  </div>
  @error('inputStatus')
    <span class="text-danger form-text">{{ $message }}</span>
  
  @enderror
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary m-1">บันทึก</button>
  <button type="reset" class="btn btn-warning m-1">เคลียร์</button>
  </div>
</form>
</div>

<div class="d-flex justify-content-start">
<a href="/footballclub" class="btn btn-success"><i class="bi bi-arrow-left-circle-fill"></i> ย้อนกลับ</a>
</div>

</div>

@include('templates.footer')