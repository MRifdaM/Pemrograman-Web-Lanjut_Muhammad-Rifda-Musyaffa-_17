@extends('layouts.template')

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Full‑width Profile Card -->
    <div class="card shadow rounded-lg">
      <div class="card-body text-center">
        <div class="position-relative d-inline-block mb-4">
          <img src="{{ asset('storage/' . ($user->foto_profile ?? 'uploads/profile/default-profile.jpg')) }}"
               alt="Profile Picture"
               class="rounded-circle"
               width="130" height="130"
               id="profile-picture">
          <form action="{{ route('profile.update-photo') }}"
                method="POST"
                enctype="multipart/form-data"
                id="photo-form">
            @csrf
            <label for="foto_profile"
                   class="btn btn-sm btn-primary position-absolute"
                   style="bottom: 0; right: 0; transform: translate(25%, 25%);">
              <i class="fas fa-camera"></i>
              <input type="file" id="foto_profile" name="foto_profile" hidden accept="image/*">
            </label>
          </form>
        </div>

        <h3 class="mb-1">{{ $user->nama }}</h3>
        <p class="text-muted mb-3">{{ $user->getRoleName() }}</p>

        <ul class="list-unstyled text-left mx-auto" style="max-width: 300px;">
          <li class="py-2 border-bottom d-flex justify-content-between">
            <span><i class="fas fa-user mr-2"></i>Username</span>
            <span class="text-secondary">{{ $user->username }}</span>
          </li>
          <li class="py-2 d-flex justify-content-between">
            <span><i class="fas fa-calendar-alt mr-2"></i>Bergabung</span>
            <span class="text-secondary">{{ $user->created_at->format('d M Y') }}</span>
          </li>
        </ul>

        <button type="button" class="btn btn-outline-primary mt-4 px-4" id="btn-edit-profile">
          Edit Profil
        </button>
      </div>
    </div>
  </div>

  <!-- Modal untuk Edit Profile -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body p-0" id="editProfileModalContent">
          <!-- Konten AJAX akan dimuat di sini -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('css')
<style>
  .list-unstyled li span {
    font-size: 0.95rem;
  }
</style>
@endpush

@push('js')
<script>
$(function() {
  // Ajax upload foto
  $('#foto_profile').change(function() {
    const form = $('#photo-form')[0];
    const formData = new FormData(form);

    if (this.files[0]) {
      const reader = new FileReader();
      reader.onload = e => $('#profile-picture').attr('src', e.target.result);
      reader.readAsDataURL(this.files[0]);

      $.ajax({
        url: $(form).attr('action'),
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success(res) {
          Swal.fire({ icon: 'success', title: 'Sukses!', text: res.message, timer: 1200, showConfirmButton: false })
            .then(() => location.reload());
        },
        error(xhr) {
          Swal.fire({ icon: 'error', title: 'Gagal!', text: xhr.responseJSON?.message || 'Gagal update foto.' });
        }
      });
    }
  });

  // Load form edit via AJAX ke dalam modal
  $('#btn-edit-profile').click(function() {
    $('#editProfileModalContent').html('<div class="text-center py-5"><div class="spinner-border"></div></div>');
    $('#editProfileModal').modal('show');
    $.get('{{ route('profile.edit') }}')
      .done(html => $('#editProfileModalContent').html(html))
      .fail(() => {
        $('#editProfileModal').modal('hide');
        toastr.error('Gagal memuat form.');
      });
  });
});
</script>
@endpush
