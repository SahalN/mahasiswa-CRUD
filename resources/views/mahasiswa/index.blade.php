@extends('layout.template')
@section('konten')
<!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url("mahasiswa") }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>

                <!-- TOMBOL TAMBAH DATA -->


                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                        <a href='{{ url("mahasiswa/create") }}' class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="">
                            <a href="{{ url("mahasiswa") }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>




                <table class="table table-bordered ">
                    <thead class="text-center">
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">NPM</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Kelas</th>
                            <th class="col-md-2">Jurusan</th>
                            <th class="col-md-2">No. HP</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->nohp }}</td>
                            <td>
                               
                                <a href='{{ url("mahasiswa/".$item->npm."/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url("mahasiswa/".$item->npm)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++?>
                        @endforeach
                    </tbody>
                </table>
                {{ $data -> withQueryString()->links() }}
          </div>
          <!-- AKHIR DATA -->
@endsection

