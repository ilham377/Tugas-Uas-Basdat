@extends('layout/main')

@section('container')

 <div style="margin-left: 100px; width: calc(100% - 300px);">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-money-bill-wave mr-2"></i>Jadwal Mata Kuliah</h3><hr>
     <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Jadwal</th>
      <th scope="col">Dosen</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">Hari</th>
      <th scope="col">Waktu</th>
      <th colspan="4" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($jadwal as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->Id_jdwl }}</td>
      <td>{{ $val->Nip}}</td>
      <td>{{ $val->kode_mk }}</td>      
      <td>{{ $val->hari }}</td>
      <td>{{ $val->waktu}}</td>
    
        <td><a href="#" class="fas bg-warning p-2 text-white rounded edit-modal-click" data-id="">Edit</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData('{{$val->Id_jdwl}}')" data-target="#DeleteModal" class="fas bg-danger p-2 text-white rounded">Delete</td>

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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/jdw/store" method="post">
              @csrf
              <div class="form-group">
                  <label>Id Jadwal</label>
                    <input type="text" name="id_jdwl" class="form-control">      
                  </div>
              <div class="form-group col-md-5">
                  <label>Dosen</label>
                    <select class="form-control form-control-md" name="nip" id="nip">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($dosen as $val)
                    <option value="{{$val->Nip}}">{{$val->nama_dosen}}</option>
             
                    @endforeach
                    </select>  
                   </div>
                <div class="form-group col-md-5">
                  <label>Mata Kuliah</label>
                    <select class="form-control form-control-md" name="kd_mk" id="kd_mk">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($mk as $val)
                    <option value="{{$val->kode_mk}}">{{$val->nama_mk}}</option>

                    @endforeach
                    </select>  
                   </div>
                  <div class="form-group">
                  <label>Hari</label>
                    <input type="text" name="hari" class="form-control">      
                  </div>
                  <div class="form-group">
                  <label>Waktu</label>
                    <input type="time" name="wkt" class="form-control">      
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/jdw/update" method="post">
              @csrf
            
                <div class="form-group">
                  <label>Id Jadwal</label>
                    <input type="text" name="eid_jdwl" id="edit-jadwal" class="form-control" readonly>      
                  </div>
              <div class="form-group col-md-5">
                  <label>Dosen</label>
                    <select class="form-control form-control-md" name="enip" id="edit_nip">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($dosen as $val)
                    <option value="{{$val->Nip}}">{{$val->nama_dosen}}</option>
             
                    @endforeach
                    </select>  
                   </div>
                <div class="form-group col-md-5">
                  <label>Mata Kuliah</label>
                    <select class="form-control form-control-md" name="ekd_mk" id="edit_mk">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($mk as $val)
                    <option value="{{$val->kode_mk}}">{{$val->nama_mk}}</option>

                    @endforeach
                    </select>  
                   </div>
                  <div class="form-group">
                  <label>Hari</label>
                    <input type="text" name="ehari" id="edit_hari" class="form-control">      
                  </div>
                  <div class="form-group">
                  <label>Waktu</label>
                    <input type="time" name="ewkt" id="edit_wkt" class="form-control">      
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
    var jdwl = rowCells.eq(1).text(); 
    var nip = rowCells.eq(2).text();
    var mk = rowCells.eq(3).text();
    var hari = rowCells.eq(4).text();
    var wkt = rowCells.eq(5).text();
     $("#edit-id").val(id);
     $("#edit-jadwal").val(jdwl);
     $("#edit-nip").val(nip);  
     $("#edit-mk").val(mk);  
     $("#edit-hari").val(hari); 
     $("#edit-wkt").val(wkt);  
     $('#EditModal').modal('show');
    });

     function deleteData(id)
     {
         var id = id;
         var url = "/jdw/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     
  </script>
  
@endsection