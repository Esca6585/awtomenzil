@extends('layouts.admin-layout')

@section('content')
<div class="card card-warning">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-briefcase"></i> Wezipäni üýtget <i class="fa fa-edit"></i></h1>
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Wezipeler</a></li>
                  <li class="breadcrumb-item active">Wezipäni üýtget</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.jobs.update', $job->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Wezipäniň ady</label>
                      <input type="text" class="form-control" placeholder="Wezipäniň ady" name="name" value="{{ $job->name }}">
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bölümler</label>
                      <select class="select2" data-placeholder="Bölüm saýlaň" style="width: 100%;" name="parent_id">
                        <option value="{{ $job->id }}" selected >{{ $job->parent->name }}</option>
                        @foreach($sections as $section)
                          <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.jobs.index') }}" class="btn btn-default"><i class="fas fa-exit"></i> Yza</a>
                
                <div style="float: right;">
                    <button class="btn btn-warning" type="submit">Üýtget</button>
                  </form>               
                </div>

                </div>

               
                
              </div>
              <!-- /.card-body -->
            </div>    

@endsection