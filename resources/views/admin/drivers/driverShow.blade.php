@extends('layouts.admin-layout')

@section('content')

<div class="card card-info">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-user"></i> Sürüjini gör <i class="far fa-eye"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">Sürüjiler</a></li>
                  <li class="breadcrumb-item active">Sürüjini gör</li>
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
                        <i class="fa fa-user"></i> Sürüji
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                      <address>
                        <p>
                          <b>
                            Ady, Familiýasy we Atasynyň ady:
                          </b> 
                            <u>{{ $driver->ady }} {{ $driver->familiyasy }} {{ $driver->atasynyn_ady }}</u>
                        </p>
                        
                        <p>
                          <b>Tabel belgisi:</b> 
                          <u>{{ $driver->tabel_belgisi }}</u>
                        </p>
                        
                        <p>
                          <b>Doglan güni we ýeri:</b>
                          <u>{{ $driver->doglan_guni }} {{ $driver->doglan_yeri }}</u>
                        </p>
                        
                        <p>
                          <b>Bilimi:</b>
                          <u>{{ $driver->bilimi }}</u>
                        </p>
                        
                        <p>
                          <b>Pasport belgisi, alynan wagty we ýeri:</b>
                          <u>{{ $driver->pasport_belgisi }} {{ $driver->pasport_alynan_wagty }} {{ $driver->pasport_alynan_yeri }}</u>
                        </p>
                        
                        <p>
                          <b>Telefon belgisi:</b> 
                          <u>{{ $driver->telefon_belgisi }}</u>
                        </p>
                        <p>
                          <b>Ýaşaýan salgysy:</b>
                          <u>{{ $driver->yashayan_salgysy }}</u>
                        </p>
                        <p>
                          <b>Suraty : </b>
                          <u><img src="{{ asset($driver->suraty) }}" alt="{{ $driver->suraty }}" width="100px"></u>
                        </p>
                        <p>
                          <b>Kim tarapyndan : </b>
                          <u><a href="{{ route('admin.users.show', $driver->user_id ) }}">{{ $driver->user->name }} {{ $driver->user->surname }} 
                            @if($driver->user->autocolumn_id == 12345)
                              Super Admin <i class="fa fa-user-cog" style="color: darkblue"></i>
                            @else
                              {{ $driver->user->autocolumn_id }} @if($driver->user->autocolumn_id == 6 || $driver->user->autocolumn_id == 9 || $driver->user->autocolumn_id == 10) - njy @else - nji @endif Awto Toplum Admin <i class="fa fa-user"></i>
                            @endif
                          </a></u>
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
                  <a href="{{ route('admin.drivers.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                  <a href="{{ route('admin.drivers.edit' , $driver->id) }}" class="btn btn-warning float-right"><i class="far fa-edit"></i> Üýtget
                  </a>
                  <a class="btn btn-primary float-right" style="margin-right: 5px; color: white">
                    <i class="fas fa-download"></i> Excel dörediň
                  </a>
                </div>
              </div>
            </div>

              
            </div>

                 


            
@endsection