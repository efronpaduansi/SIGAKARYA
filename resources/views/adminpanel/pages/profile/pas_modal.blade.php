{{--Update Password Modal--}}
<div class="modal fade" id="passModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="passModalLabel">Ubah Kata Sandi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.passwordUpdate', $profile->id) }}" method="POST" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="oldPass">Kata Sandi Lama <small class="text-danger">*</small></label>
                        <input type="password" name="oldPass" id="oldPass"  class="form-control" placeholder="Masukan Kata Sandi" required>
                    </div>

                    <div class="form-group">
                        <label for="newPass">Kata Sandi Baru <small class="text-danger">*</small></label>
                        <input type="password" name="newPass" id="newPass"  class="form-control" placeholder="Masukan Kata Sandi" required>
                    </div>

                    <div class="form-group">
                        <label for="confPass">Konfirmasi Kata Sandi <small class="text-danger">*</small></label>
                        <input type="password" name="confPass" id="confPass"  class="form-control" placeholder="Masukan Kata Sandi" data-parsley-equalto="#newPass" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan perubahan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
