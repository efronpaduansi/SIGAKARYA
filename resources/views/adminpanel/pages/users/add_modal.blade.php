{{--Add User Modal--}}
<div class="modal fade" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserModalLabel">Tambah Pengguna Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" data-parsley-validate>
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addName">Nama <small class="text-danger">*</small></label>
                                <input type="text" name="addName" id="addName" class="form-control" placeholder="Masukan Nama" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addEmail">Email Address <small class="text-danger">*</small></label>
                                <input type="email" name="addEmail" id="addEmail" class="form-control" placeholder="Masukan Email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="addRole">Peran <small class="text-danger">*</small></label>
                            <select name="addRole" id="addRole" class="form-select" required>
                                <option disabled selected hidden>Pilih</option>
                                <option value="admin">Admin</option>
                                <option value="bendahara">Bendahara</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="addPass">Kata Sandi <small class="text-danger">*</small></label>
                                <input type="password" name="addPass" id="addPas" class="form-control" placeholder="Masukan Kata Sandi" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="confPass">Ulangi Kata Sandi <small class="text-danger">*</small></label>
                                <input type="password" name="confPas" id="confPass" class="form-control"
                                       placeholder="Ulangi Kata Sandi" required >
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

