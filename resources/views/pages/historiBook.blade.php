@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<link rel="stylesheet" type="text/css" href="/css/detailroom.css">
@endsection
@section('content')
<div class="row">
  <div class="col-w-9">
    <h1>Historis Booklist</h1>
  </div>
    <div class="col-w-1">
    <form action="logout" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit"> logout</button>
  </form>
  </div>
</div>
<div class="row">
  <div class="col-w-1"></div>
    <div class="col-w-10 center pageRoomFont" style="height: 90vh;" id="bookinglist">
      <div class="row">
        <div class="col-w-2"></div>
        <h1 class="col-w-8">BOOK LIST</h1>
        <div class="col-w-2"><button class="btn btn-primary" onclick="window.location.href = 'home'">Back</button></div>
      </div>
      <div class="row tableBookHead">
        <table class="table">
          <thead style="text-align: center;background-color: grey;">
            <tr>
              <th>ID</th>
              <th>Nama Ruangan</th>
              <th>Gedung</th>
              <th>Waktu Pinjam</th>
              <th>Waktu Selesai</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody style="text-align: center;height: 200px;">
            @foreach($list as $booklist)
            <tr>
              <td>
                {{$booklist->id}}
              </td>
              <td>
                {{$booklist->room_nama}}
              </td>
              <td>
                {{$booklist->building_nama}}
              </td>
              <td>
                {{$booklist->waktu_Pinjam_Mulai}}
              </td>
              <td>
                {{$booklist->waktu_Pinjam_Selesai}}
              </td>
              <td>
                Status: {{$booklist->status}}<br>
                Nama : {{$booklist->nama}}<br>
                NPK : {{$booklist->NPK}}<br>
                purpose : {{$booklist->keperluan}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- Halaman : {{ $list->currentPage() }} <br/>
        Jumlah Data : {{ $list->total() }} <br/>
        Data Per Halaman : {{ $list->perPage() }} <br/> -->

      </div>
      <div> {{ $list->links() }} </div>
    </div>
    <div class="col-w-1"></div>

</div>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }


  $("input").keyup(function() {
    if($(this).val().length >= 1) {
      var input_flds = $(this).closest('form').find(':input');
      input_flds.eq(input_flds.index(this) + 1).focus();
    }
  });

</script>
@endsection