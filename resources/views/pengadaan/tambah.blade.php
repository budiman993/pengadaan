<!-- Modal -->
<div class="modal fade" id="pengadaanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/tambahPengadaan" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="modal-body">
      
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pengadaan</label>
                    <input type="text" class="form-control" id="nama_pengadaan" name="nama_pengadaan" placeholder="Masukkan Nama">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukkan Gambar" accept="image/png, image/jpeg, image/gif">
                  </div>

                  <div class="form-group">
                    <label>Anggaran: <input type="" class="labelRp" disable style="border: none; bacgorund-color: white; color: black;"></label>

                    <input type="number" class="form-control" id="anggaran" name="anggaran" placeholder="Masukkan Anggaran" onKeyup="currency()">
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