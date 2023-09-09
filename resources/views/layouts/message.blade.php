@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.error') }}
    </div>
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $error }}
        </div>
    @endforeach
@endif


@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.error') }}
    </div>
@endif

@if (session('save'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.save') }}
    </div>
@endif

@if (session('update'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.update') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.delete') }}
    </div>
@endif


@if (session('promote'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.promote') }}
    </div>
@endif
@if (session('promote_empty'))
    <div class="alert  alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.promote_empty') }}
    </div>
@endif
@if (session('returned_prom'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.returned_prom') }}
    </div>
@endif
@if (session('returned_graduted'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.returned_graduted') }}
    </div>
@endif
@if (session('returned_prom_all'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.returned_prom_all') }}
    </div>
@endif

@if (session('graduate'))
    <div class="alert  alert-success" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('message.graduate') }}
    </div>
@endif

@if (session('not_attendance'))
    <div class="alert  alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ trans('Attendance_trans.not_attendance') }}
    </div>
@endif
