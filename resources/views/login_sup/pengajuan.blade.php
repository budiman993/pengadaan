<div class="modal fade" id="pengajuanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/tambahPengajuan" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="id_pengadaan">
      <div class="modal-body">
      
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pengadaan</label>
                    <input type="text" class="form-control nama_pengadaan" id="nama_pengadaan" name="nama_pengadaan" placeholder="Masukkan Nama" disabled>
                  </div>
                 
                  <div class="form-group">
                    <label>Anggaran: <input type="" class="labelRp" disable style="border: none; bacgorund-color: white; color: black;"></label>

                    <input type="number" class="form-control anggaran" id="anggaran" name="anggaran" placeholder="Masukkan Anggaran" onKeyup="currency()">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Proposal</label>
                    <input type="file" class="form-control" id="proposal" name="proposal" placeholder="Masukkan proposal" accept="application/pdf">
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