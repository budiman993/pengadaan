<!-- Modal -->
<div class="modal fade" id="ubahModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="id_pengadaan"></input>
      <div class="modal-body">
      
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pengadaan</label>
                    <input type="text" class="form-control nama_pengadaan" id="u_nama_pengadaan" name="u_nama_pengadaan" placeholder="Masukkan Nama">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <textarea type="text" class="form-control deskripsi" id="u_deskripsi" name="u_deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Anggaran: <input type="" class="labelRp" disable style="border: none; bacgorund-color: white; color: black;"></label>

                    <input type="number" class="form-control anggaran" id="u_anggaran" name="u_anggaran" placeholder="Masukkan Anggaran" onKeyup="currency2()">
                  </div>

                  
                 
                </div>
                <!-- /.card-body -->
          
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>