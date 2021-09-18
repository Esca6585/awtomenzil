@extends('layouts.admin-layout')

@section('content')
<div class="card card-success">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-list-alt"></i> Bölümi goşmak <i class="fa fa-plus"></i></h1>
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.sections.index') }}">Bölümler</a></li>
                  <li class="breadcrumb-item active">Bölümi goşmak</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.sections.store') }}" method="post">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Bölümiň ady</label>
                      <input type="text" class="form-control" placeholder="Bölümiň ady" name="name">
                    </div>
                  </div>
                  
                </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.sections.index') }}" class="btn btn-default"><i class="fas fa-exit"></i> Yza</a>
                
                <div style="float: right;">
                    <button class="btn btn-success" type="submit">Goşmak</button>
                  </form>               
                </div>

                </div>

                
              </div>
              <!-- /.card-body -->
            </div>    

@endsection
