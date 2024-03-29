{!! Form::open(['route' => ['monitorings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ url('/monitoring/survey', $id) }}" class='btn btn-default btn-xs' title="Survey">
        <i class="fa fa-poll"></i>
    </a>
    <a href="{{ route('monitorings.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    @if(Session::get('role') == 1)
        <a href="{{ route('monitorings.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-edit"></i>
        </a>
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endif
</div>
{!! Form::close() !!}
