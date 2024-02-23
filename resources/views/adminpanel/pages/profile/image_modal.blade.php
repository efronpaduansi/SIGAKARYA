{{--Update Profile Image Modal--}}
<div class="modal fade" id="imageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="passModalLabel">Unggah Foto Profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.profileImgUpdate', $profile->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="addImage">Foto Profil <small class="text-danger">*</small></label>
                        <input type="file" name="addImage" id="addImage" class="form-control" required>
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
