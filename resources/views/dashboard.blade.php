@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- Orders -->
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <h4 class="mb-3 mb-md-0">Orders</h4>
</div>

@foreach ($table as  $item)
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-baseline">
      <h6 class="card-title mb-0">Table No.: {{ $loop->index+1 }}</h6>
      <div class="mb-2">
        <span class="badge badge-danger">Live</span>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-xl-12">
        <h3 class="mb-2">Check Orders: <a class="btn btn-sucess" href="{{url('/tables/data-order/'.$item->id)}}">Click here!</a></h3>
        <div class="d-flex align-items-baseline">
          <p class="text-success">
            <span>In Progress: 0</span>
           <!-- <i data-feather="arrow-up" class="icon-sm mb-1"></i> -->
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush