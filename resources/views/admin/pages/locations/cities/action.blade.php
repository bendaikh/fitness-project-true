<td>
    @adminCan('city.edit')
        <a href="{{ route('admin.city.edit', $city->id) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
    @endadminCan

    @adminCan('city.delete')
        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
            onclick="deleteData({{ $city->id }})">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    @endadminCan
</td>
