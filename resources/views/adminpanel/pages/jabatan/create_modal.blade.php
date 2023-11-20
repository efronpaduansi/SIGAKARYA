{{-- Create Modal --}}
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jabatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jabatan.store') }}" method="POST" data-parsley-validate>
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addKode">Kode <small class="text-danger">*</small></label>
                                <input type="text" name="addKode" id="addKode" class="form-control"
                                    placeholder="Masukan Kode" required data-parsley-maxlength="25">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addNama">Nama Jabatan <small class="text-danger">*</small></label>
                                <input type="text" name="addNama" id="addNama" class="form-control"
                                    placeholder="Masukan Nama Jabatan" required data-parsley-maxlength="50">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addGapok">Gaji Pokok <small class="text-danger">*</small></label>
                                <input type="text" name="addGapok" id="addGapok" class="rupiah form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addUangMakan">Uang Makan <small class="text-danger">*</small></label>
                                <input type="text" name="addUangMakan" id="addUangMakan" class="rupiah form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addUangTransport">Uang Transport <small
                                        class="text-danger">*</small></label>
                                <input type="text" name="addUangTransport" id="addUangTransport"
                                    class="rupiah form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addTunjanganKesehatan">Tunjangan Kesehatan <small
                                        class="text-danger">*</small></label>
                                <input type="text" name="addTunjanganKesehatan" id="addTunjanganKesehatan"
                                    class="rupiah form-control">
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
