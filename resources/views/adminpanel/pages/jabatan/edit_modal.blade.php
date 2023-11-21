<div class="modal fade" id="editModal{{ $item->kode }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Jabatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jabatan.update', $item->kode) }}" method="POST" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editKode">Kode <small class="text-danger">*</small></label>
                                <input type="text" name="editKode" id="editKode" class="form-control"
                                    value="{{ $item->kode }}" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editNama">Nama Jabatan <small class="text-danger">*</small></label>
                                <input type="text" name="editNama" id="editNama" class="form-control"
                                    placeholder="Masukan Nama Jabatan" value="{{ $item->nama }}" required
                                    data-parsley-maxlength="50">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editGapok">Gaji Pokok <small class="text-danger">*</small></label>
                                <input type="text" name="editGapok" id="editGapok" class="rupiah form-control"
                                    value="{{ $item->gaji_pokok }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editUangMakan">Uang Makan <small class="text-danger">*</small></label>
                                <input type="text" name="editUangMakan" id="editUangMakan"
                                    class="rupiah form-control" value="{{ $item->uang_makan }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editUangTransport">Uang Transport <small
                                        class="text-danger">*</small></label>
                                <input type="text" name="editUangTransport" id="editUangTransport"
                                    class="rupiah form-control" value="{{ $item->uang_transport }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editTunjanganKesehatan">Tunjangan Kesehatan <small
                                        class="text-danger">*</small></label>
                                <input type="text" name="editTunjanganKesehatan" id="editTunjanganKesehatan"
                                    class="rupiah form-control" value="{{ $item->tunjangan_kesehatan }}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                class="fas fa-times"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
