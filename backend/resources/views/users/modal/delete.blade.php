<div class="modal fade" id="delete-user-{{ $user->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title h2 fw-bold text-danger">Delete User</h3>
          </div>
          <div class="modal-body">
              <h4>{{ $user->name }}</h4>

              @if ($user->avatar)
              <img src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}"
                  class="img-thumbnail d-block mx-auto"
                  style="width: 250px; height:150px; object-fit:cover;">
          @else
              <i class="fa-solid fa-image fa-5x d-block text-center"></i>
          @endif
              <p class="mt-3 mb-0"><span class="small text-muted">Email:</span> {{ $user->email }}</p>
          </div>
          <div class="modal-footer border-0">
              <form action="{{ route('user.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')

                  <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-triangle-exclamation"></i>Delete</button>
              </form>
          </div>
      </div>
  </div>
</div>




