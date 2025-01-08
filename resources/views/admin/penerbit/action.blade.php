<div class="btn-group">
    <a type="button" class="btn btn-sm btn-primary" data-id="{{ $id }}" href="{{ route('penerbit.show', $id) }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a type="button" class="btn btn-sm btn-warning" data-id="{{ $id }}" href="{{ route('penerbit.edit', $id) }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button type="button" class="delete-penerbit btn btn-sm btn-danger" data-id="{{ $id }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>
