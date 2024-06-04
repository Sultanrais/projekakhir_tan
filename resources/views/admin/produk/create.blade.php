<div class="row p-2">
    <div class="col-md-6">
        <div class="card">


            <div class="card-body">

                <h5><b>{{$title}}</b></h5>
                <hr>
                @isset($produk)
                <form action="/admin/produk/{{$produk->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form action="/admin/produk" method="POST" enctype="multipart/form-data">>
                        @endisset
                        @csrf
                        <label for="">Nama produk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Nama produk" value="{{isset($produk) ? $produk->name : old('name') }}">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="">Nama produk</label>
                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="">
                            <option value="">-- Kategori --</option>
                            @foreach ($kategori as $item)
                            <option value="{{$item->id}}"{{isset($produk) ?$item->id == $produk->kategori_id ? 'selected' : '' : ''}}>  {{$item->name}}</option>

                            @endforeach
                        </select>

                        @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        <label for="">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="" placeholder="Harga" value="{{isset($produk) ? $produk->harga : old('harga') }}">

                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="">Stock</label>
                        <input type="number" class="form-control @error('kategori_id') is-invalid @enderror" name="stock" id="" placeholder="Stock" value="{{isset($produk) ? $produk->stock : old('stock') }}">

                        @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{isset($produk) ? $produk->gambar : old ('gambar') }}">

                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        
                        @isset($produk)
    <img src="/{{$produk->gambar}}" width="100px" alt="">
@endisset
<br>

<a href="/admin/produk" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i>Kembali</a>
<button type="submit" class="btn btn-primary mt2"><i class="fas fa-save"></i>Simpan</button>


                       

                    </form>

            </div>
        </div>
    </div>
</div>