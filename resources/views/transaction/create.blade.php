@extends('layouts.app')
@section('title', __('Add Transaction'))

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            {{ __('Add Transaction') }}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            @include('part.profile')
        </div>
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('account.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">{{ __("Account Information") }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">{{ __('Account Name') }}</label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="{{ __('Account Name') }}.." type="text"
                                value="{{ old('name') }}"> @if ($errors->has('name'))
                            <small class="invalid-feedback">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{ __('Account Image/Icon') }}</label>
                            <input name="image" type="file">
                            <br> @if ($errors->has('image'))
                            <small class="invalid-feedback">{{ $errors->first('image') }}</small>
                            @else
                            <small class="text-info">{{ __('By default, account image is a wallet icon, max file size is 500kb.') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('Currency symbol placement') }}</label>
                            <select name="currency_placement" class="form-control{{ $errors->has('currency_placement') ? ' is-invalid' : '' }}">
                                <option value="before" @if( 'before'==old( 'currency_placement')) selected @endif>{{ __('Before the Number') }}</option>
                                <option value="after" @if( 'after'==old( 'currency_placement')) selected @endif>{{ __('After the Number') }}</option>
                            </select>
                            @if ($errors->has('currency_placement'))
                            <small class="invalid-feedback">{{ $errors->first('currency_placement') }}</small>
                            @endif
                        </div>

                        <div class="form-group" style="max-width: 300px;">
                            <label class="form-label">{{ __('Current Balance') }}</label>
                            <div class="input-group">
                                <span class="input-group-prepend currency-prepend" style="display:none">
                                    <span class="input-group-text currency">$</span>
                                </span>
                                <input class="form-control text-right{{ $errors->has('balance') ? ' is-invalid' : '' }}" aria-label="Insert current balance"
                                    placeholder="{{ __('Insert current Account balance') }}.." type="text" name="balance" value="{{ old('balance') }}">
                                <span class="input-group-append currency-append" style="display:none">
                                    <span class="input-group-text currency">$</span>
                                </span>
                            </div>
                            @if ($errors->has('balance'))
                            <small class="invalid-feedback" style="display:block">{{ $errors->first('balance') }}</small>
                            @endif
                        </div>


                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <button href="javascript:void(0)" type="reset" class="btn btn-link">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary ml-auto">{{ __('Save Account') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('after_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        
    });
</script>
@endsection