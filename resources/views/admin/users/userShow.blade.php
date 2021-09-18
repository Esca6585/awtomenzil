@extends('layouts.admin-layout')

@section('content')

<div class="card card-info">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-user-circle"></i> Ulanyjyny gör <i class="far fa-eye"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Ulanyjylar</a></li>
                  <li class="breadcrumb-item active">Ulanyjyny gör</li>
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
                            Ady, Familiýasy:
                          </b> 
                            <u>{{ $user->name }} {{ $user->surname }}</u>
                        </p>
                        
                        <p>
                          <b>Email:</b> 
                          <u>{{ $user->email }}</u>
                        </p>
                        
                        <p>
                          <b></b>
                          <u>
                            @if($user->autocolumn_id == 12345)
                              Super Admin <i class="fa fa-user-cog" style="color: darkblue"></i>
                            @else
                              {{ $user->autocolumn_id }} @if($user->autocolumn_id == 6 || $user->autocolumn_id == 9 || $user->autocolumn_id == 10) - njy @else - nji @endif Awto Toplum Admin <i class="fa fa-user"></i>
                            @endif
                          </u>
                        </p>
                        
                        <p>
                          <b>Suraty : </b>
                          <u><img src="/{{ $user->image }}" alt="{{ $user->image }}" width="100px"></u>
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
                  <a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                  <a href="{{ route('admin.users.edit' , $user->id) }}" class="btn btn-warning float-right"><i class="far fa-edit"></i> Üýtget
                  </a>
                  <a class="btn btn-primary float-right" style="margin-right: 5px; color: white">
                    <i class="fas fa-download"></i> Excel dörediň
                  </a>
                </div>
              </div>
            </div>

               


            </div>

                 


            
@endsection