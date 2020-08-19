@extends('layout/main')

@section('container')

 <div style="margin-left: 100px; width: calc(100% - 300px);">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-money-bill-wave mr-2"></i>Jurusan</h3><hr>
     <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Jurusan</th>
      <th scope="col">Nama Jurusan</th>
      <th colspan="4" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($jurusan as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->Id_jurusan }}</td>   
      <td>{{ $val->nama_jurusan }}</td>
      
    
        <td><a href="#" class="fas bg-warning p-2 text-white rounded edit-modal-click" data-id="">Edit</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData('{{$val->Id_jurusan}}')" data-target="#DeleteModal" class="fas bg-danger p-2 text-white rounded">Delete</td>

    </tr>
    @endforeach



  </tbody>
</table>

</div>
</div>

<div class="modal fade" id="CreateModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/jurusan/store" method="post">
              @csrf
              <div class="form-group">
                  <label>Id Jurusan</label>
                    <input type="text" name="idjurusan" class="form-control">      
                  </div>
                <div class="form-group">
                  <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control">      
                  </div>

          <div class="modal-footer">  
        <button type="submit" class="btn btn-success" data-dissmis="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/jurusan/update" method="post">
              @csrf
            
                <div class="form-group">
                  <label>Id Jurusan</label>
                    <input type="text" name="eidjurusan" id="edit-idjrs" class="form-control" readonly>      
                  </div>

                 <div class="form-group">
                  <label>Jurusan</label>
            <input type="text" name="ejurusan" id="edit-nama" class="form-control">      
          </div>
          
          <div class="modal-footer">  
        <button type="submit" class="btn btn-success" data-dissmis="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="get">
         <div class="modal-content">
             <div class="modal-header bg-danger">                 
                 <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 <p class="text-center">Are You Sure Want To Delete ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>

@endsection

@section('js')

<script type="text/javascript">
  $(document).on("click", ".edit-modal-click", function () {
    var id = $(this).attr('data-id');
    var rowCells = $(this).closest("tr").children(); 
    var idjrs = rowCells.eq(1).text();
    var nama = rowCells.eq(2).text();
     $("#edit-idjrs").val(idjrs);
     $("#edit-nama").val(nama);  
     $('#EditModal').modal('show');
    });

     function deleteData(id)
     {
         var id = id;
         var url = "/jurusan/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     
  </script>
@endsection

