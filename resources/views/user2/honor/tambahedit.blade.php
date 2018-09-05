<div class="modal" id="modal-panitiaedit" style="overflow:hidden" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="PanitiaTambahEdit" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                        </button>
                        <h3 class="modal-title">Tambah Panitia</h3>
                    </div>
    
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Panitia</label>
                            <div class="col-md-6">
                                <select class="form-control js-country select2" id="dosen" name="dosen_id" style="width: 420px;">
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group">
                          <label class="col-md-3 control-label">Jabatan Kepanitiaan</label>
                          <div class="col-md-6">
                              <select class="form-control js-country" id="jabatan" name="jabatan_id">
                                  <option value="-1">Pilih Jabatan</option>
                                  @foreach ($jabatans as $jabatan)
                                      <option value="{{$jabatan->id}}">{{$jabatan->nama_jabatan}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('honor') ? ' has-error' : '' }}">
                            <label for="honor" class="col-md-3 control-label">Honorium</label>
        
                            <div class="col-md-6">
                                <input  class="form-control honor" id="honors"  name="honor" step="0.01"  type="number"  value="" required>
                                 @if ($errors->has('honor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('honor') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pajak') ? ' has-error' : '' }}">
                                <label for="pajak" class="col-md-3 control-label">Pajak</label>
            
                                <div class="col-md-6">
                                    <input class="form-control pajak" id="pajaks"  name="pajak"  step="0.01" type="number"  value="" required>
                                     @if ($errors->has('pajak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pajak') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                                    <label for="total" class="col-md-3 control-label">Total</label>
                
                                    <div class="col-md-6">
                                        <input class="form-control total" id="totals" name="total"  type="number" step="0.01" value="" required readonly> 
                                        @if ($errors->has('total'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                    </div>
    
                    <div class="modal-footer">
                        <a onclick="tambahPanitia({{$lap_honors->id}})" class="btn btn-primary btn-save">Simpan</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
      $('#dosen').select2({
      placeholder: 'Pilih nama dosen..',
      minimumInputLength: 2, 
      // tags: true,
      ajax: {
        type: 'GET',
        url: 'http://localhost:3001/api/showdata',
        dataType: 'json',
        delay: 250,
        processResults: function (res) {
              console.log($('#dosen').val());

          return {
            results:  $.map(res, function (item) {
                  return {
                      id: item.ID,
                      text: item.Nama
                  }
              })
          };
        },
        cache: true
      }
    });
  });

  $('#honors').keyup(function(){
    $('#totals').val($(this).val() - ($('#honors').val() * $('#pajaks').val()));
  });

  $('#pajaks').keyup(function(){
    $('#totals').val($('#honors').val() - ($('#honors').val() * $(this).val()));
  });

  function tambahPanitia(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var inputData = $('#PanitiaTambahEdit').serialize();
    var parent = $(this).parent();
        $.ajax({
          url: '{{ url('/honor/tambahedit') }}' + '/' + id + '/'+'store',
          type: 'POST',
          data: inputData,
            success : function(data) {
                swal({
                    title: 'Sukses!',
                    text: 'Data Honor Panitia Ditambah',
                    type: 'success',
                    timer: '15000'  
                })
                setTimeout(function(){ location.reload(true); }, 1500);
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    text:'Data Belum Lengkap',
                    type: 'error',
                    timer: '1600'
                })
            }
        });
}
</script>
@endpush

