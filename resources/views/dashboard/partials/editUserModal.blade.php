<div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Form Edit {{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: left;">
                <form action="" method="post" id="editformuser">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nomor_induk" class="form-label">Nomor Induk</label>
                        <input type="number" class="form-control @error('nomor_induk') is-invalid @enderror" id="nomor_induk" name="nomor_induk" value="{{ old('nomor_induk') }}" required>
                        @error('nomor_induk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @if(Request::is('dashboard/admin'))
                    <input type="hidden" name="role_id" id="role_id" value="{{ 2 }}">
                    @else
                    <div class="mb-3">
                        <label for="role_id" class="form-label d-block">User Role</label>
                        <select class="form-select" aria-label="Default select example" name="role_id" id="role_id" value="{{ old('role_id') }}" required>
                            <option selected disabled>Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#edituser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var userId = button.data('id');
            var userName = button.data('name');
            var userNomorInduk = button.data('nomor_induk');
            var userEmail = button.data('email');
            var userRoleId = button.data('role_id');

            var modal = $(this);
            modal.find('.modal-title').text('Form Edit User');
            modal.find('#id').val(userId);
            modal.find('#name').val(userName);
            modal.find('#nomor_induk').val(userNomorInduk);
            modal.find('#email').val(userEmail);
            modal.find('#role_id').val(userRoleId);

            var form = modal.find('#editformuser');
            var updateUrl = '/dashboard/users/' + userId; // Membuat URL update
            form.attr('action', updateUrl); // Set atribut action form
        });
    });
</script>