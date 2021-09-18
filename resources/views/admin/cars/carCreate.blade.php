@extends('layouts.admin-layout')

@section('content')
<div class="card card-success">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-car"></i> Ulag goşmak <i class="fa fa-plus"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">Ulaglar</a></li>
                  <li class="breadcrumb-item active">Ulag goşmak</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.cars.store') }}" method="post">
                @csrf

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Awtoulagyň kysymy</label>
                      <input type="text" class="form-control" placeholder="Awtoulagyň kysymy" name="awtoulagyn_kysymy" value="{{ old('awtoulagyn_kysymy') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                    <label for="">Awtoulagyň görnüşi</label>
                      <input type="text" class="form-control" placeholder="Awtoulagyň görnüşi" name="awtoulagyn_gornushi" value="{{ old('awtoulagyn_gornushi') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Awtoulogyň şahsy belgisi</label>
                      <input type="text" class="form-control" placeholder="Awtoulogyň şahsy belgisi" name="awtoulogyn_shahsy_belgisi" value="{{ old('awtoulogyn_shahsy_belgisi') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Çykan ýyly</label>
                      <input type="text" class="form-control" placeholder="Çykan ýyly" name="cykan_yyly" value="{{ old('cykan_yyly') }}">
                    </div>
                  </div>
                  
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Win kody</label>
                      <input type="text" class="form-control" placeholder="Win kody" name="win_kody" value="{{ old('win_kody') }}">
                    </div>
                  </div>

            </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.cars.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                
                <div style="float: right;">

                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
               

                    <button class="btn btn-success" type="submit">Goşmak</button>
                  </form>               
                </div>

                </div>

                
              </div>
              <!-- /.card-body -->
            </div>    

@endsection
