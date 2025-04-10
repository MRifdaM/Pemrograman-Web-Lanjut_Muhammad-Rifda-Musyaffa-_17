<form action="{{ url('penjualan-detail/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Hidden Penjualan ID (terenkripsi) -->
                <input type="hidden" name="penjualan_id" id="penjualan_id" value="{{ encrypt($penjualan->penjualan_id) }}">
                <div class="form-group">
                    <label>Kode Penjualan</label>
                    <input type="text" class="form-control" name="penjualan_kode" id="penjualan_kode" value="{{ $penjualan->penjualan_kode }}" readonly>
                </div>

                <!-- Dropdown Barang -->
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->barang_id }}" data-harga="{{ $barang->harga_jual }}">
                                {{ $barang->barang_nama }} ({{ $barang->harga_jual ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>

                <!-- Jumlah -->
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                    <small id="error-jumlah" class="error-text form-text text-danger"></small>
                </div>

                <!-- Harga (diinput manual) -->
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" required>
                    <small class="form-text text-muted">
                        Catatan: Harga total sebaiknya sesuai dengan hasil perkalian harga jual barang dan jumlah.
                    </small>
                    <small id="error-harga" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function(){
    $("#form-tambah").validate({
        rules: {
            barang_id: { required: true, number: true },
            jumlah: { required: true, number: true, min: 1 },
            harga: { required: true, number: true }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if(response.status) {
                        $("#myModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message
                        });
                        dataPenjualanDetail.ajax.reload();
                    } else {
                        $(".error-text").text("");
                        $.each(response.msgField, function(prefix, val) {
                            $("#error-" + prefix).text(val[0]);
                        });
                        Swal.fire({
                            icon: "error",
                            title: "Terjadi Kesalahan",
                            text: response.message
                        });
                    }
                }
            });
            return false;
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function(element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) {
            $(element).removeClass("is-invalid");
        }
    });
});
</script>
