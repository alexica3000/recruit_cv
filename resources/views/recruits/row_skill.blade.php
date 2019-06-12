<tr>
    <td>{{ $fields->char }}</td>
        <input form="edit" type="hidden" value="{{ $fields->char }}" name="{{$type}}[{{ $loop->index }}][char]">
    <td>{{ $fields->description }}</td>
        <input form="edit" type="hidden" value="{{ $fields->description }}" name="{{$type}}[{{ $loop->index }}][description]">
        <input form="edit" type="hidden" value="{{ $fields->id }}" name="{{$type}}[{{ $loop->index }}][skill_id]">
    <td class="cell-flex">
        <a href="#" class="btn btn-outline-danger btn-sm delete_skill" data-toggle="modal" data-target="#confirmSkillsModal">
            <i class="cvd-trash"></i>
        </a>
    </td>
</tr>