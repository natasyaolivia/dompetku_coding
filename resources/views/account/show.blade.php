@extends('layouts.app')
@section('title', __('Show Account'))

@section('before_script')

@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            {{ __('Show Account') }}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            @include('part.profile')
        </div>
        <div class="col-md-8">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-6">
                    <a href="{{ route('transaction.create', $account->id) }}"><button class="btn btn-success"> <span class="fa fa-plus"></span> {{ __("Create Transaction") }}</button></a>
                </div>
                <div class="col-md-6 pull-right">
                    <div class="input-icon ml-2">
                        <span class="input-icon-addon">
                            <i class="fe fe-search"></i>
                        </span>
                        <input class="form-control w-10" placeholder="{{ __('Search Transaction') }}" type="text">
                    </div>
                </div>
            </div>
            <div class="card">

                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>{{ __('Transaction Date') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Balance') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($transactions->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">{{ __('No data found') }}</td>
                        </tr>
                        @endif
                        @php $no = 1; @endphp
                        @foreach($transactions as $key => $transaction)
                        <tr>
                            <th>{{ ($transactions->currentPage() - 1) * $transactions->perPage() + ($no + $key) }}</th>
                            <td>
                                {{ $transaction->date }}
                            </td>
                            <td>
                                @if($transaction->type == 'cr')
                                <span class="text-success">{{ $transaction->formattedAmount }}</span>
                                @endif
                                @if($transaction->type == 'db')
                                <span class="text-danger">- {{ $transaction->formattedAmount }}</span>
                                @endif
                            </td>
                            <td>
                                <small>{{ $transaction->excerpt }}</small>
                            </td>
                            <td>
                                {{ $transaction->formattedBalance }}
                            </td>
                            <td>
                                <button class="btn btn-default btn-sm"> <span class="fa fa-eye"></span> {{ __("Detail") }}</button>
                                <button class="btn btn-default btn-sm"> <span class="fa fa-pencil"></span> {{ __("Edit") }}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $transactions->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open modal
      </button>
      
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              Modal body..
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>

@endsection

@section('after_script')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection