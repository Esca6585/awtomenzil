@extends('layouts.admin-layout')

@section('content')
<div class="card card-success">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-briefcase"></i> Wezipe goşmak <i class="fa fa-plus"></i></h1>
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Wezipeler</a></li>
                  <li class="breadcrumb-item active">Wezipe goşmak</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.jobs.store') }}" method="post">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Ady</label>
                      <input type="text" class="form-control" placeholder="Ady" name="name">
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bölümler</label>
                      <select class="select2" data-placeholder="Bölüm saýlaň" style="width: 100%;" name="parent_id">
                        <option value=""></option>
                        @foreach($jobs as $job)
                          <option value="{{ $job->id }}">{{ $job->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.jobs.index') }}" class="btn btn-default"><i class="fas fa-exit"></i> Yza</a>
                
                <div style="float: right;">
                    <button class="btn btn-success" type="submit">Goşmak</button>
                  </form>               
                </div>

                </div>

               
                
              </div>
              <!-- /.card-body -->
            </div>    

@endsection