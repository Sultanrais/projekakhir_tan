<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Kode Produk</label>
                    </div>

                    <div class="col-md-8">
                        <select name="produk_id" class="form-control" id="">
                            <option value="">-- Nama Produk --</option>
                        </select>
                    </div>
                </div>


                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Name Produk</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name_produk">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Harga Satuan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="harga_satuan">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="">QYT</label>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex">
                            <button class="btn btn-primary"><i class="fas fa-minus"></i></button>
                            <input type="number" class="form-control" name="qyt">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i></button>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <h5>Subtotal : Rp. 20000</h5>

                    </div>
                </div>





                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <a href="/admin/transaksi" class="btn btn-info"><i class="fas fa-arrow-left"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-arrow-right"></i></button>

                    </div>
                </div>



            </div>


        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>no</th>
                        <th>Nama Produk</th>
                        <th>QYT</th>
                        <th>#</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tanggo</td>
                        <td>4</td>
                        <td>
                            <a href=""><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                </table>
                <a href="" class="btn btn-success"><i class="fas fa-check"></i>Selesai</a>
                <a href="" class="btn btn-info"><i class="fas fa-file"></i>Pending</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="">Total Belanja</label>
                    <input type="number" name="total_belanja" class="form-control" id="">
                </div>

                <div class="form-group">
                    <label for="">Dibayarkan</label>
                    <input type="number" name="dibayarkan" class="form-control" id="">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Hitung</button>

                <div class="form-group">
                    <label for="">Uang Kembalian</label>
                    <input type="number" disabled name="kembalian" class="form-control" id="">
                </div>

            </div>
        </div>
    </div>
</div>