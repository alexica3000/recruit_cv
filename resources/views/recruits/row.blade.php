<tr>
    <td>{{ $field->employer }}</td>
        <input form="edit" type="hidden" value="{{ $field->employer }}" name="{{$type}}[{{ $loop->index }}][employer]">
    <td>{{ $field->job }}</td>
        <input form="edit" type="hidden" value="{{ $field->job }}" name="{{$type}}[{{ $loop->index }}][work_job]">
    <td>{{ $field->start_date->format('Y') }}</td>
        <input form="edit" type="hidden" value="{{ $field->start_date->format('Y') }}" name="{{$type}}[{{ $loop->index }}][start_year]">
        <input form="edit" type="hidden" value="{{ $field->start_date->format('m') }}" name="{{$type}}[{{ $loop->index }}][start_month]">

    @if(empty($field->end_date))
        <td></td>
        <td>No</td>
            <input form="edit" type="hidden" value="" name="{{$type}}[{{ $loop->index }}][end_year]">
            <input form="edit" type="hidden" value="" name="{{$type}}[{{ $loop->index }}][end_month]">
    @else
        <td>{{ $field->end_date->format('Y') }}</td>
        <td>Yes</td>
            <input form="edit" type="hidden" value="{{ $field->end_date->format('Y') }}" name="{{$type}}[{{ $loop->index }}][end_year]">
            <input form="edit" type="hidden" value="{{ $field->end_date->format('m') }}" name="{{$type}}[{{ $loop->index }}][end_month]">
    @endif

    <td class="cell-flex">
        <a href="#" class="table-link edit_work" data-toggle="modal">
            <i class="cvd-edit"></i>
            Edit
        </a>
        <a href="#" class="table-link" data-table-collapse="#{{$hidden}}Row{{ $loop->index }}">
            <i class="cvd-arrow-right"></i>
            Open information
        </a>
        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
            <i class="cvd-trash"></i>
        </a>
    </td>
</tr>

<tr class="row-hide" id="{{$hidden}}Row{{ $loop->index }}">
    <td style="white-space:normal" colspan="6" class="cell-description">{{ $field->description }}</td>
        <input form="edit" type="hidden" value="{{ $field->description }}" name="{{$type}}[{{ $loop->index }}][work_description]">
        <input form="edit" type="hidden" value="{{ $field->id }}" name="{{$type}}[{{ $loop->index }}][work_id]">
</tr>
