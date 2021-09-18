@extends('layouts.admin-layout')

@section('content')
<div class="card card-warning">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-user"></i> Ulanyjyny üýtget <i class="far fa-edit"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Ulanyjylar</a></li>
                  <li class="breadcrumb-item active">Ulanyjyny üýtget</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">

              <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                  @csrf
                  @method('put')
                  <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Ady</label>
                      <input type="text" class="form-control" placeholder="Ady" name="name" value="{{ $user->name }}">
                    </div>
                  
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label for="">Familiýasy</label>
                      <input type="text" class="form-control" placeholder="Familiýasy" name="surname" value="{{ $user->surname }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                    <label for="">Email</label>
                      <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
                    </div>
                  </div>
                  
                  @if($user->autocolumn_id != 12345)
                  <div class="col-6">
                    <div class="form-group">
                        <label for="">Awto Toplum</label>
                        <input type="number" class="form-control" placeholder="Awto Toplum" name="autocolumn_id" value="{{ $user->autocolumn_id }}">
                      </div>
                    </div>
                  @else
                    <input type="hidden" class="form-control" placeholder="Awto Toplum" name="autocolumn_id" value="{{ $user->autocolumn_id }}">
                  @endif

                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Suraty</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label> 
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>

                
                
                </div>
            </div>

          <div class="card-footer">
            <a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                
                <div style="float: right;">

                    <button class="btn btn-warning" type="submit">Üýtget</button>
                  </form>               
                </div>

                </div>
                 
                
              </div>
              <!-- /.card-body -->
            </div>  

@endsection
