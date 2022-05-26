@push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('third_party_scripts')
    @include('layouts.datatables_js')
   <!--  <script type="text/javascript">
		$(document).ready(function () {
		    // Setup - add a text input to each footer cell
		    $('#dataTableBuilder thead tr')
		        .clone(true)
		        .addClass('filters')
		        .appendTo('#dataTableBuilder thead');
		});
	</script> -->
    {!! $dataTable->scripts() !!}
@endpush
