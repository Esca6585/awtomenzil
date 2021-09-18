@extends('layouts.admin-layout')

@section('content')
<div class="card card-info">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-columns"></i> 
                        @if(Auth::user()->autocolumn_id == 12345)
                            Awto Toplumlar
                        @else
                            Awto Toplum - {{ Auth::user()->autocolumn_id }}
                        @endif
               gör <i class="fa fa-eye"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.cars.index') }}">
                        @if(Auth::user()->autocolumn_id == 12345)
                            Awto Toplumlar
                        @else
                            Awto Toplum - {{ Auth::user()->autocolumn_id }}
                        @endif
                  </a></li>
                  <li class="breadcrumb-item active">
                        @if(Auth::user()->autocolumn_id == 12345)
                            Awto Toplumlar
                        @else
                            Awto Toplum - {{ Auth::user()->autocolumn_id }}
                        @endif
                   gör</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <!-- <div class="card-body"> -->
            <div class="invoice p-3 mb-3">
              <!-- jumbotron  -->
              <div class="jumbotron">
              <!-- container  -->
                <div class="container">
              <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <i class="fa fa-columns"></i> 
                        @if(Auth::user()->autocolumn_id == 12345)
                            Awto Toplumlar
                        @else
                            Awto Toplum - {{ Auth::user()->autocolumn_id }}
                        @endif
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                      <address>
                        <p>
                          <b>Sürüji:</b> 
                            <a href="{{ route('admin.drivers.show', $autocolumn->driver->id ) }}">{{ $autocolumn->driver->ady }} {{ $autocolumn->driver->familiyasy }} {{ $autocolumn->driver->atasynyn_ady }} - ( {{ $autocolumn->driver->tabel_belgisi }} )</a>
                        </p>
                        
                        <p>
                          <b>Ulag:</b> 
                          <a href="{{ route('admin.cars.show', $autocolumn->car->id ) }}">{{ $autocolumn->car->awtoulagyn_kysymy }} - {{ $autocolumn->car->awtoulagyn_gornushi }} - ( {{ $autocolumn->car->awtoulogyn_shahsy_belgisi }} )</a>
                        </p>
                        
                      </address>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- container -->
              </div>
              <!-- jumbotron -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ route('admin.autocolumn.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                  <a href="{{ route('admin.autocolumn.edit', $autocolumn->id) }}" class="btn btn-warning float-right"><i class="far fa-edit"></i> Üýtget
                  </a>
                  <a class="btn btn-primary float-right" style="margin-right: 5px; color: white">
                    <i class="fas fa-download"></i> Excel dörediň
                  </a>
                </div>
              </div>
            </div>

              
            </div>
@endsection
