{{-- @extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <input type="text" class="mail_text" name="nama" placeholder="Nama 
Rak" value="{{ $rak->nama }}" />
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" />
        <input type="text" class="mail_text" name="keterangan" placeholder="Keterangan" value="{{ $rak->keterangan }}" />

        <input type="text" id="datepicker" name="tanggal" placeholder="tanggal">
        <input type="submit" value="{{ $store }}" />
        <div class="send_bt">
            <a href="{{ url('/rak_buku') }}">Kembali</a>
        </div>
    </form>
@endsection --}}

@extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <script>
        $(function() {
        $("#btn-save").click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                nama: $('#nama').val(),
                lokasi: $('#lokasi').val(),
                keterangan: $('#keterangan').val()
            };
            var state = $('#btn-save').val();
            var type = "POST";
            var id = $('#id').val();
            var ajaxurl = '{{ $action }}';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function(data) {
                    var todo = 'Pengiriman Data berhasil'
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        });
        });
    </script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <input type="text" class="mail_text" id="nama" name="nama" placeholder="Nama Rak"
            value="{{ $rak->nama }}" /><br>
        @error('nama')
            <b>{{ $message }}</b>
        @enderror
        <br>
        <input type="text" class="mail_text" id="lokasi" name="lokasi" placeholder="Lokasi"
            value="{{ $rak->lokasi }}" /><br>
        @error('lokasi')
            <b>{{ $message }}</b>
        @enderror
        <br>
        <input type="text" class="mail_text" id="keterangan" name="keterangan" placeholder="keterangan"
            value="{{ $rak->keterangan }}" /><br>
        <p><input type="text" id="datepicker" name="tanggal" placeholder="tanggal"></p>
        {{-- <input type="submit" value="{{ $store }}" /> --}}
        <div class="save_bt" id="btn_save">
            Simpan
        </div>
        <div class="send_bt">
            <a href="{{ url('/rak_buku') }}">Kembali</a>
        </div>
    </form>
@endsection
