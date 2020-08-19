@extends('layout/main')

@section('container')

 <div style="margin-left: 100px; width: calc(100% - 300px);">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-money-bill-wave mr-2"></i>Mahasiswa</h3><hr>
     <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Alamat</th>
      <th colspan="4" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($mahasiswa as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->Nim }}</td>
      <td>{{ $val->nama_mhs }}</td>
      <td>{{ $val->Id_jurusan }}</td>
      <td>{{ $val->jk}}</td>
      <td>{{ $val->ttl}}</td>
      <td>{{ $val->alamat}}</td>
      
    
        <td><a href="#" class="fas bg-warning p-2 text-white rounded edit-modal-click" data-id="">Edit</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData('{{$val->Nim}}')" data-target="#DeleteModal" class="fas bg-danger p-2 text-white rounded">Delete</td>

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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/mhs/store" method="post">
              @csrf
              <div class="form-group">
                  <label>NIM</label>
                    <input type="text" name="nim" class="form-control">      
                  </div>
                <div class="form-group">
                  <label>Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control">      
                  </div>
                 
                 <div class="form-group col-md-5">
                  <label>Jurusan</label>
                    <select class="form-control form-control-md" name="id_jrs" id="id_jrsn">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($jurusan as $val)
                    <option value="{{$val->Id_jurusan}}">{{$val->nama_jurusan}}</option>
             
                    @endforeach
                    </select>  
                   </div>
                 
                  <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select class="form-control form-control-sm" name="jk">
                      <option selected disabled value="">-- Please Select --</option>
                      <option value="L">L</option>
                      <option value="P">P</option>
                    </select>
                  </div>  
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                    <input type="date" name="tgl" class="form-control">      
                  </div>
                  <div class="form-group">
                  <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>      
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/mhs/update" method="post">
              @csrf
            
                <div class="form-group">
                  <label>NIM</label>
                    <input type="text" name="enim" id="edit-nim" class="form-control" readonly>      
                  </div>
                <div class="form-group">
                  <label>Nama Mahasiswa</label>
                    <input type="text" name="enama" id="edit-nama" class="form-control">      
                  </div>
                 
                 <div class="form-group col-md-5">
                  <label>Jurusan</label>
                    <select class="form-control form-control-md" name="eid_jrs" id="id_jrsn">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($jurusan as $val)
                    <option value="{{$val->Id_jurusan}}" >{{$val->Id_jurusan}}</option>
             
                    @endforeach
                    </select>  
                   </div>
                 
                  <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select class="form-control form-control-sm" name="ejk" id="edit-jk>
                      <option selected disabled value="">-- Please Select --</option>
                      <option value="L">L</option>
                      <option value="P">P</option>
                    </select>
                  </div>  
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                    <input type="date" name="etgl" id="edit-tgl" class="form-control">      
                  </div>
                  <div class="form-group">
                  <label>Alamat</label>
                    <textarea class="form-control" name="ealamat" id="edit-alamat" rows="3"></textarea>      
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
    var nim = rowCells.eq(1).text();
    var nama = rowCells.eq(2).text();
    var jurusan = rowCells.eq(3).text();
    var jk = rowCells.eq(4).text();
    var ttl = rowCells.eq(5).text();
    var alamat = rowCells.eq(6).text();
     $("#edit-id").val(id);
     $("#edit-nim").val(nim);
     $("#edit-nama").val(nama);
     $("#id-jrsn").val(jurusan);   
     $("#edit-jk").val(jk);  
     $("#edit-tgl").val(ttl); 
     $("#edit-alamat").val(alamat);  
     $('#EditModal').modal('show');
    });

     function deleteData(id)
     {
         var id = id;
         var url = "/mhs/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     
  </script>
@endsection

