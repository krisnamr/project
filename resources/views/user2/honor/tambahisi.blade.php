<div class="modal" id="modal-panitia" style="overflow:hidden" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formPanitiaTambah" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
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
                </div>

                <div class="modal-footer">
                    <a data-id="{{$lap_honors->id}}" id="btnPanitiaTambah" onclick="tambahPanitia()" class="btn btn-primary btn-save">Tambah</a>
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
            
            // tags: true,
            ajax: {
                type: 'GET',
                url: 'http://localhost:3001/api/showdata/+id',
                // dataType: 'json',
                // delay: 250,
                processResults: function (response) {
                    console.log($('#dosen').val());
                    return {
                        results:  $.map(response, function (item) {
                            return {
                                id: item.ID,
                                text: item.Nama
                            }
                        })
                    };
                },
                // cache: true
            }
          });
        });

        function tambahPanitia(){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var inputData = $('#formPanitiaTambah').serialize();
            var dataId = $('#btnPanitiaTambah').attr('data-id');
            var parent = $(this).parent();
                $.ajax({
                  url: '{{ url('/honor/tambahisi') }}' + '/' + dataId + '/'+'store',
                  type: 'POST',
                  data: inputData,
                    success : function(data) {
                        swal({
                            title: 'Sukses!',
                            text: 'Data Panitia Ditambah',
                            type: 'success',
                            timer: '15000'  
                        })
                        setTimeout(function(){ location.reload(true); }, 1600);
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
        }
</script>
@endpush
