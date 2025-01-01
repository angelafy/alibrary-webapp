<div class="btn-group">
    <a type="button" class="btn btn-sm btn-primary" data-id="{{ $id }}" href="{{ route('bukus.show', $id) }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a type="button" class="btn btn-sm btn-warning" data-id="{{ $id }}"  href="{{ route('bukus.edit', $id) }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button type="button" class="btn btn-sm btn-danger delete-buku" data-id="{{ $id }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>

{{-- 
<td>
    <a data-id="{{ $id }}" href="#">View</a>
</td>,
<td>
    <a href="#">Edit</a>
</td>,
<td>
    <a data-id="{{ $id }}" class="delete" href="#">Delete</a>
</td> --}}

{{-- <div class="btn-list flex-nowrap">
  <a href="#" class="btn btn-outline-primary w-100 btn-sm" style="width: 100px; font-size: 12px; padding: 5px;">
    Edit
  </a>
  <a data-id="{{ $id }}" class="delete btn btn-danger w-100 btn-sm" style="width: 100px; font-size: 12px; padding: 5px;">
       Delete
  </a>
</div> --}}

{{-- <button data-id="{{ $id }}" class="delete btn btn-danger btn-sm">Delete</button> --}}
