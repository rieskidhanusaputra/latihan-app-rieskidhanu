@extends('layouts.app')
{{-- <h2>Tambahkan Biodata Anda</h2> --}}
@section('title', 'Biodata Karyawan')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <table>
        <form action="" method="post">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input name="nama" type="text" size=20></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input name="email" type="text" size=20></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td><input name="no_hp" type="text" size=20></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Kirim"></td>
            </tr>
        </form>
    </table>
@endsection
