@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                {{ __('messages') }}
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable datatable-message" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                            <tr data-entry-id="{{ $message->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <form onclick="return confirm('are you sure ? ')"  class="d-inline" action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection


@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 50,
  });
  $('.datatable-message:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush