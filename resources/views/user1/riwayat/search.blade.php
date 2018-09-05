@extends('user1/riwayat/base')
@section('action-content')
@if (session('error'))
    <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        {{ session('error') }}
    </div>
@endif
    <section class="content">
      <div class="box"> 
            <form action="{{route('riwayat.search')}}" id="formPanitiaTambah" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                         <h4 class="modal-title"><strong> Rekapitulasi Honor Dosen</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                                <label class="col-md-3 control-label" style="font-size: 18px">Cari Berdasarkan Nama: </label>
                            <div class="col-md-5">
                                <select class="form-control js-country select2" id="dosen" name="dosen_id" required style="width: 420px;"></select>
                                <button id="btnPanitiaTambah" onclick="tambahPanitia()" class="btn btn-primary btn-save">Cari</button>
                            </div>
                        </div>
                    </div>
            </form>                     
        </div>
    </section>
@endsection

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
</script>
@endpush
