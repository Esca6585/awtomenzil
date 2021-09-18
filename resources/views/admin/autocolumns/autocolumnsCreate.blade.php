@extends('layouts.admin-layout')

@section('content')
<div class="card card-success">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-columns"></i> 1-nji Awto Toplum goşmak <i class="fa fa-plus"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">1-nji Awto Toplum</a></li>
                  <li class="breadcrumb-item active">1-nji Awto Toplum goşmak</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.autocolumn.store') }}" method="post">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sürüji</label>
                      <select class="select2" multiple="multiple" data-placeholder="Sürüji saýlaň" style="width: 100%;" name="driver_ids[]">
                        @foreach($drivers as $driver)
                          <option value="{{ $driver->id }}">{{ $driver->ady }} {{ $driver->familiyasy }} {{ $driver->atasynyn_ady }} - ( {{ $driver->tabel_belgisi }} )</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ulag</label>
                      <select class="select2" data-placeholder="Ulag saýlaň" style="width: 100%;" name="car_id">
                        <option value=""></option>
                        @foreach($cars as $car)
                          <option value="{{ $car->id }}">{{ $car->awtoulagyn_kysymy }} - {{ $car->awtoulagyn_gornushi }} - ( {{ $car->awtoulogyn_shahsy_belgisi }} )</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.cars.index') }}" class="btn btn-default"><i class="fas fa-exit"></i> Yza</a>
                
                <div style="float: right;">
                  @if(Auth::user()->autocolumn_id != 12345)
                    <input type="hidden" name="autocolumn_id" value="{{ Auth::user()->autocolumn_id }}">
                  @endif

                    <button class="btn btn-success" type="submit">Goşmak</button>
                  </form>               
                </div>

                </div>

                
              </div>
              <!-- /.card-body -->
            </div>    

@endsection
