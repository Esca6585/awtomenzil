@extends('layouts.admin-layout')

@section('content')
<div class="card card-success">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-user-circle"></i> Ulanyjy goşmak <i class="fa fa-plus"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Ulanyjylar</a></li>
                  <li class="breadcrumb-item active">Ulanyjy goşmak</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">

              <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">

                  @csrf
                  <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Ady</label>
                      <input type="text" class="form-control" placeholder="Ady" name="name" value="{{ old('name') }}">
                    </div>
                  
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label for="">Familiýasy</label>
                      <input type="text" class="form-control" placeholder="Familiýasy" name="surname" value="{{ old('surname') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Awto Toplum</label>
                      <input type="number" class="form-control" placeholder="Awto Toplum" name="autocolumn_id" value="{{ old('autocolumn_id') }}">
                    </div>
                  </div>


                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Suraty</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="{{ old('image') }}">
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

                    <button class="btn btn-success" type="submit">Goşmak</button>
                  </form>               
                </div>

                </div>
                 
            
              </div>
              <!-- /.card-body -->
            </div>  

@endsection