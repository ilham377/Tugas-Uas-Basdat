@extends('layout/main')

@section('container')

 <div style="margin-left: 100px; width: calc(100% - 300px);">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-money-bill-wave mr-2"></i>Nilai</h3><hr>
     <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIM</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">UTS</th>
      <th scope="col">UAS</th>
      <th scope="col">Nilai Akhir</th>
      <th scope="col">Indeks</th>
      <th colspan="4" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($nilai as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->Nim }}</td>
      <td>{{ $val->kode_mk }}</td>
      <td>{{ $val->uts}}</td>
 	  <td>{{ $val->uas}}</td>
 	  <td>{{ $val->na}}</td>
 	  <td>{{ $val->hm}}</td>

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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/nilai/store" method="post">
              @csrf
              <div class="form-group">
                  <label>NIM</label>
                    <input type="text" name="nim" class="form-control">      
                  </div>
                <div class="form-group col-md-5">
                  <label>Mata Kuliah</label>
                    <select class="form-control form-control-md" name="mk" id="mk">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($mk as $val)
                    <option value="{{$val->kode_mk}}">{{$val->nama_mk}}</option>

                    @endforeach
                    </select>  
                   </div>
                  <div class="form-group">
                  <label>UTS</label>
                    <input type="number" name="uts" class="form-control">      
                  </div>

                  <div class="form-group">
                  <label>UAS</label>
                    <input type="number" name="uas" class="form-control">      
                  </div>

                  <div class="form-group">
                  <label>Nilai Akhir</label>
                    <input type="number" name="na" class="form-control">      
                  </div>

                  <div class="form-group">
                  <label>Indeks</label>
                    <input type="char" name="hm" class="form-control">      
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
            <form action="/nilai/update" method="post">
              @csrf
            
                <div class="form-group">
                  <label>NIM</label>
                    <input type="text" name="enim" id="edit-nim" class="form-control" readonly>      
                  </div>
                <div class="form-group col-md-5">
                  <label>Mata Kuliah</label>
                    <select class="form-control form-control-md" name="emk" id="edit-mk">
                    <option selected disabled value="">-- Please Select --</option>
                    @foreach ($mk as $val)
                    <option value="{{$val->kode_mk}}">{{$val->nama_mk}}</option>

                    @endforeach
                    </select>  
                   </div>
                  <div class="form-group">
                  <label>UTS</label>
                    <input type="number" name="euts" id="edit-uts" class="form-control">      
                  </div>

                  <div class="form-group">
                  <label>UAS</label>
                    <input type="number" name="euas" id="edit-uas" class="form-control">      
                  </div>

                  <div class="form-group">
                  <label>Nilai Akhir</label>
                    <input type="number" name="ena" id="edit-na" class="form-control">      
                  </div>

                  <div class="form-group">
                  <label>Indeks</label>
                    <input type="char" name="ehm" id="edit-hm" class="form-control">      
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
    var mk = rowCells.eq(2).text();
    var uts = rowCells.eq(3).text();
    var uas = rowCells.eq(4).text();
    var na = rowCells.eq(5).text();
    var hm = rowCells.eq(6).text();
     $("#edit-id").val(id);
     $("#edit-nim").val(nim);
     $("#edit-mk").val(mk);  
     $("#edit-uts").val(uts);  
     $("#edit-uas").val(uas); 
     $("#edit-na").val(na); 
     $("#edit-hm").val(hm); 
     $('#EditModal').modal('show');
    });

     function deleteData(id)
     {
         var id = id;
         var url = "/nilai/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     
  </script>
@endsection

