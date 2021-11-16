@extends('adminlte::page')

@section('title', 'User Detail')

@section('content_header')
    <h1>User Detail</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Add User</div>
                <div class="card-body">
                   <form action="{{ route('user.update', ['user'=>$user->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="put">

                      {{-- Name field --}}
                      <div class="input-group mb-3">
                          <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{$user->name}}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                              </div>
                          </div>
                          @if($errors->has('name'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </div>
                          @endif
                      </div>

                      {{-- Email field --}}
                      <div class="input-group mb-3">
                          <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{$user->email}}" placeholder="{{ __('adminlte::adminlte.email') }}">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                              </div>
                          </div>
                          @if($errors->has('email'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </div>
                          @endif
                      </div>

                      {{-- Password field --}}
                      <div class="input-group mb-3">
                          <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('adminlte::adminlte.password') }}">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                              </div>
                          </div>
                          @if($errors->has('password'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </div>
                          @endif
                      </div>

                      {{-- Confirm password field --}}
                      <div class="input-group mb-3">
                          <input type="password" name="password_confirmation"
                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                              </div>
                          </div>
                          @if($errors->has('password_confirmation'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </div>
                          @endif
                      </div>

                      <div class="input-group mb-3">
                        <label class="btn">
                            <input type="checkbox" name="is_admin" value="1"  {{($user->is_admin == 1)?'checked':''}}> Akun Pemilik
                        </label>
                      </div>

                      {{-- Register button --}}
                      <button type="submit" class="btn {{ config('adminlte.classes_auth_btn', 'btn btn-primary') }}">
                          <span class="fas fa-user-plus"></span>
                          Add User
                      </button>
                        @include('componen.btnBack')
                  </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

