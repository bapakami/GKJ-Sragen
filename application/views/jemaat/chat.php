<div class='container'>
  <div class="modal-dialog modal-lg modalnya">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pesan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="card direct-chat direct-chat-primary">
        <div class="modal-body">
          <div class="card-body">
            <div class="direct-chat-messages">
              <div id="daftarChatNya"></div>
            </div>
          </div>
          <div id="focus"></div>   
        </div>

        <div class="modal-footer">
          <form id="chattingan">
            <div class="form-group">
              <textarea rows="3" name="chatnya" class="form-control" placeholder="Isikan sesuatu" required="required"></textarea>
            </div>
            <button type="button" id="submitComponent" class="btn btn-success btn-mod"><i class="fa fa-paper-plane"></i> Kirim</button>
          </form>
        </div>
      </div>     
    </div>
  </div><br>
</div>
</div>

<script>  
  $(document).ready(function() {
    daftarChatnyaIni();
  }); 

  var interval = setInterval(function() {
      daftarChatnyaIni();
    }, 2000);


  $('.close').on('click', function() {
    clearInterval(interval);
  })




  $('#submitComponent').on('click', function(e) {
    e.preventDefault();

    var fd = new FormData();
    var chat = $('textarea[name=chatnya]').val();
    var id = '<?= $id ?>';
    fd.append('chat', chat);


    $.ajax({
      url: '<?= site_url("warga/layanan/sendChat/") ?>'+id,
      type: 'post',
      data: fd,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.s == 'sukses') {
          daftarChatnyaIni();
          $('textarea[name=chatnya]').focus();
          $('textarea[name=chatnya]').val('');
        } else {
          toastr.error(response.m);
        }
      },
    });
  });

  function daftarChatnyaIni() {
    var id = '<?= $id ?>';
    var url = '<?= site_url("warga/layanan/daftarChat/") ?>'+id;
    $('#daftarChatNya').load(url);
  }
</script>
