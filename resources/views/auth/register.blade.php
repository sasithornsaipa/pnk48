@extends('layouts.master')

@section('title')
Register
@endsection

<!-- @php
    $state = ['Amnat Charoen','Ang Thong','Bangkok','Buri Ram','Chantha Buri',
    'Cha Choeng Sao','Chon Buri', 'Chai Nat','Chaiyaphum', 'Chumphon','Chiang Rai',
    'Chiang Mai','Krabi', 'Kanchana Buri', 'Kalasin', 'Kamphaeng Phet',
    'Khon Kaen','Lop Buri','Lampang','Lamphun','Loei','Maha Sarakham',
    'Muk Dahan','Mae Hong Son','Nakhon Nayok','Nakhon Pathom','Nakhon Phanom',
    'Nakhon Rajcha Sima','Nakhon Sri Thamaraj','Nakhon Sawan','Nontha Buri',
    'Nara Thiwat','Nan','Nongkai','Nong Bua Lumphu','Pathum Thani','Prachuap Khiri Khan',
    'Prachin Buri','Pattani','Phra Nakhon Sri Ayutthaya','Phayao','Phang Nga',
    'Phatthalung','Phichit','Phit Sanulok','Phetcha Buri','Phetchabun','Phrae',
    'Phuket','Roi Et','Ranong','Rayong','Rajcha Buri','Si Saket','Sakon Nakhon',
    'Songkhla','Satun','Samut Prakan','Samut Songkhram','Samut Sakhon','Sra Kiao',
    'Sara Buri','Sing Buri','SuKhothai','Suphan Buri','Surat Thani','Surin',
    'Trang','Trat','Tak','Udon Thani','Utta Radit','Uthai Thani',
    'Ubon Rajchathani','Ya Sothon','Yala',];
@endphp -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address2') }}</label>

                            <div class="col-md-6">
                                <input id="address2" type="text" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" value="{{ old('address2') }}" required autofocus>

                                @if ($errors->has('address2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="state" required autofocus>
                                  @foreach($state as $key)
                                    @if(old('state') == $key)
                                      <option value="{{ $key }}" selected>{{ $key }}</option>
                                    @else
                                      <option value="{{ $key }}">{{ $key }}</option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode') }}" required autofocus>

                                @if ($errors->has('zipcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
