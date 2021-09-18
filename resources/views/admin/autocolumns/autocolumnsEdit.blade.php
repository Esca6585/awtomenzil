@extends('layouts.admin-layout')

@section('content')
<div class="card card-warning">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-columns"></i> Awto Toplum - {{ Auth::user()->autocolumn_id }} üýtget <i class="fa fa-edit"></i></h1>

             
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">Awto Toplum - {{ Auth::user()->autocolumn_id }}</a></li>
                  <li class="breadcrumb-item active">Awto Toplum - {{ Auth::user()->autocolumn_id }} üýtget</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.autocolumn.update', $autocolumn->id ) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sürüji</label>
                      <select class="select2" data-placeholder="Sürüji saýlaň" style="width: 100%;" name="driver_id">
                        <option value="{{ $autocolumn->driver->id }}" selected >{{ $autocolumn->driver->ady }} {{ $autocolumn->driver->familiyasy }} {{ $autocolumn->driver->atasynyn_ady }} - ( {{ $autocolumn->driver->tabel_belgisi }} )</option>
                        @foreach($drivers as $driver)
                          <option value="{{ $driver->id }}">{{ $driver->ady }} {{ $driver->familiyasy }} {{ $driver->atasynyn_ady }} - ( {{ $driver->tabel_belgisi }} )</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
  
                  <div class="col-md-6" id="gyzyl">
                    <div class="form-group">
                      <label>Ulag</label>
                      <select class="select2" data-placeholder="Ulag saýlaň" style="width: 100%;" name="car_id">
                        <option value="{{ $autocolumn->car->id }}" selected >{{ $autocolumn->car->awtoulagyn_kysymy }} - {{ $autocolumn->car->awtoulagyn_gornushi }} - ( {{ $autocolumn->car->awtoulogyn_shahsy_belgisi }} )</option>
                        @foreach($cars as $car)
                          <option value="{{ $car->id }}">{{ $car->awtoulagyn_kysymy }} - {{ $car->awtoulagyn_gornushi }} - ( {{ $car->awtoulogyn_shahsy_belgisi }} )</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <a href="{{ route('admin.drivers.show', $autocolumn->driver->id ) }}" class="btn btn-info"><i class="fa fa-eye"></i> {{ $autocolumn->driver->ady }} {{ $autocolumn->driver->familiyasy }} {{ $autocolumn->driver->atasynyn_ady }} - ( {{ $autocolumn->driver->tabel_belgisi }} ) sürüjiniň maglumatlaryna gir</a>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <a href="{{ route('admin.cars.show', $autocolumn->car->id ) }}" class="btn btn-info"><i class="fa fa-eye"></i> {{ $autocolumn->car->awtoulagyn_kysymy }} - {{ $autocolumn->car->awtoulagyn_gornushi }} - ( {{ $autocolumn->car->awtoulogyn_shahsy_belgisi }} ) ulagyň maglumatlaryna gir</a>
                    </div>
                  </div>
                  

                </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.cars.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                
                <div style="float: right;">
                    @if(Auth::user()->autocolumn_id != 12345)
                      <input type="hidden" name="autocolumn_id" value="{{ Auth::user()->autocolumn_id }}">
                    @endif
                    
                    <button class="btn btn-warning" type="submit">Üýtget</button>
                  </form>               
                </div>

                </div>

                
              </div>
              <!-- /.card-body -->
            </div>    

@endsection