{{-- <div class="btn-group">
  <button type="button" class="btn btn-sm btn-success approve-btn" data-id="{{ $id }}"
      style="padding: 4px 8px; font-size: 12px;">
      <i class="fa-solid fa-circle-check"></i>
  </button>
  <button type="button" class="btn btn-sm btn-danger delete" data-id="{{ $id }}"
      style="padding: 4px 8px; font-size: 12px;">
      <i class="fa-solid fa-circle-xmark"></i>
  </button>
</div> --}}

<div class="btn-group">
    <button type="button" class="btn btn-sm btn-primary" data-id="{{ $id }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-eye"></i>
    </button>
    <button type="button" class="btn btn-sm btn-warning" data-id="{{ $id }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>
    <button type="button" class="btn btn-sm btn-danger delete-penulis" data-id="{{ $id }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>

