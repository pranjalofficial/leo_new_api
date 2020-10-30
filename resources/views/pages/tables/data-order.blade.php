@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')


<div style="display: none">
    {{ $total = 0 }}
    {{ $final = 0 }}
</div>


<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Table</h6>
        <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Cost</th>
                  <th scope="col">Count</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order as  $item)
                <tr>
                  <th scope="row"><a class="btn btn-success">{{$item->item_name}}</a></th>
                  <td>{{$item->item_cost}}</td>
                  <td><a class="btn btn-primary" href="{{url('/minus/order/'.$item->id)}}" >-</a><span style="padding: 2%">{{$item->item_count}}</span><a class="btn btn-primary">+</a></td>
                  <td>{{$item->item_total}}</td>
                </tr>
                @endforeach
                @foreach ($order as  $item)
                <div style="display: none">{{$total += $item->item_total}}</div>
                @endforeach
                <tr>
                    <th scope="row" ></th>
                    <td></td>
                    <td>Total</td>
                    <td>{{$total}}</td>
                </tr>
    
                <tr>
                    <th scope="row" ></th>
                    <td></td>
                    <td>5% CGST</td>
                    <td>{{$total * 0.05}}</td>
                </tr>
    
                <tr>
                    <th scope="row" ></th>
                    <td></td>
                    <td>5% SGST</td>
                    <td>{{$total * 0.05}}</td>
                </tr>
    
                <tr>
                    <th scope="row" ></th>
                    <td></td>
                    <td>5% SGST</td>
                    <td>{{$final = $total + $total * 0.05 + $total * 0.05}}</td>
                </tr>
    
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush