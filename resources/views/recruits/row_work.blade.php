<tr>
    <td>{{ $field->employer }}</td>
        {{--<input form="edit" type="hidden" value="{{ $field->employer }}" name="employer">--}}
    <td>{{ $field->job }}</td>
        {{--<input form="edit" type="hidden" value="{{ $field->job }}" name="work_job">--}}
    <td>{{ $field->start_date->format('Y') }}</td>
        {{--<input form="edit" type="hidden" value="{{ $field->start_date->format('Y') }}" name="start_year">--}}
        {{--<input form="edit" type="hidden" value="{{ $field->start_date->format('m') }}" name="start_month">--}}

    @if(empty($field->end_date))
        <td></td>
        <td>No</td>
            {{--<input form="edit" type="hidden" value="" name="end_year">--}}
            {{--<input form="edit" type="hidden" value="" name="end_month">--}}
    @else
        <td>{{ $field->end_date->format('Y') }}</td>
        <td>Yes</td>
            {{--<input form="edit" type="hidden" value="{{ $field->end_date->format('Y') }}" name="end_year">--}}
            {{--<input form="edit" type="hidden" value="{{ $field->end_date->format('m') }}" name="end_month">--}}
    @endif

    <td class="cell-flex">
        <a href="#" class="table-link edit_work" data-toggle="modal">
            <i class="cvd-edit"></i>
            Edit
        </a>
        <a href="#" class="table-link" data-table-collapse="#hiddenRow{{ $field->id }}">
            <i class="cvd-arrow-right"></i>
            Open information
        </a>
        <a href="#" class="btn btn-outline-danger btn-sm delete_work" data-toggle="modal" data-target="#confirmSkillsModal">
            <i class="cvd-trash"></i>
        </a>
    </td>
</tr>

<tr class="row-hide" id="hiddenRow{{ $field->id }}">
    <td style="white-space:normal" colspan="6" class="cell-description">{{ $field->description }}</td>
{{--        <input form="edit" type="hidden" value="{{ $field->description }}" name="work_description">--}}
        <input form="edit" type="hidden" value="{{ $field->id }}" name="work_id">
</tr>
